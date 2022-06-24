<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalType;
use App\Models\PageType;
use App\Models\Page;
use App\Services\Geocode;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
//use Carbon;
class AnimalPublicController extends Controller
{
    protected function search(AnimalType $animalType = null, Request $request)
    {
        if (!$animalType) {
            return redirect()->route('adopt-a-pet', ['animal_type' => 'dog']);
        }

        $breeds = Animal::distinct('breed')->where('animal_status_id', 2)->orderBy('breed', 'asc')->pluck('breed');
        $years = Animal::distinct('year_of_birth')->where('animal_status_id', 2)->orWhere('animal_status_id', 4)->orderBy('year_of_birth', 'asc')->pluck('year_of_birth');

        // Split animal attributes depending on animal type
        $animalAttributesDogs = collect(config('mtar.animal_attributes.dogs'))->filter(fn($item) => $item['public']);
        $animalAttributesCats = collect(config('mtar.animal_attributes.cats'))->filter(fn($item) => $item['public']);

        // Create Query Builder
        $animals = $animalType->animals()
            ->with('location')
            ->whereHas('status', function($query) {
                $query->public();
            });

        if ($request->getQueryString()) {
            $request->validate([
                'distance' => ['nullable', 'numeric'],
                'postcode' => ['required_unless:distance,null']
            ],[
                    'postcode.required_unless' => 'Postcode is required if you filter by distance'
              ]
            );

            $name = $request->input('name');
            $breed = $request->input('breed');
            $sex = $request->input('gender');
            $attributes = $request->input('attributes');
            $postcode = $request->input('postcode');
            $distance = $request->input('distance');

            //Get new and latest updates
            $days_no = $request->input('days_no');
            $days = Carbon::today()->subDays($days_no);
//            dump($days);

            //Prepare the age range search
            $date_type_from = $request->input('date_type_from');
            $date_type_to = $request->input('date_type_to');
            $from_age = $request->input('age_from');
            $to_age = $request->input('age_to');

            if($date_type_from === 'year' || $date_type_to === 'year'){
                $age_start = \Carbon\Carbon::now()->subYear($from_age);
                $age_end = \Carbon\Carbon::now()->subYear($to_age);
            } elseif($date_type_from === 'month' || $date_type_to === 'month') {
                $age_start = \Carbon\Carbon::now()->subMonth($from_age);
                $age_end = \Carbon\Carbon::now()->subMonth($to_age);
            } else {
                $age_start = \Carbon\Carbon::now()->subWeek($from_age);
                $age_end = \Carbon\Carbon::now()->subWeek($to_age);
            }

            $year_start = Carbon::createFromFormat('Y-m-d H:i:s', $age_start);
            $year_end = Carbon::createFromFormat('Y-m-d H:i:s', $age_end);
//            $start = date("Y-m-d H:i:s");
//            $end = date("Y-m-d H:i:s");
            if($year_start >= $year_end){
                $start = $year_end;
                $end = $year_start;
            } else{
                $start = $year_start;
                $end = $year_end;
            }

            $general_search = $request->input('general_search');

            // Postcode check

            if ($postcode) {
                $geocode = resolve(Geocode::class);
                if ($geocode->loadAddress($postcode)) {
                    $coordinates = $geocode->getCoordinates();
                }
            }

            $coordinates = $coordinates ?? null;

            $animals = $animals
                ->unless($coordinates, function ($query, $coordinates) {
                    // Coordinates not found
                    $query->selectRaw('animals.*');
                })
                ->when($coordinates, function ($query, $coordinates) use ($distance) {
                    // Coordinates found
                    $unit = 3963.17;
                    $lat = (float)$coordinates->lat;
                    $lng = (float)$coordinates->lng;
                    $radius = (double)$distance;

                    $sql = "($unit * ACOS(COS(RADIANS($lat))
                                * COS(RADIANS(latitude))
                                * COS(RADIANS($lng) - RADIANS(longitude))
                                + SIN(RADIANS($lat))
                                * SIN(RADIANS(latitude))))";

                    $query->selectRaw("animals.*, latitude, longitude, $sql AS distance");

                    // Apply distance filter
                    return ($distance) ? $query->whereRaw($sql . '<=' . $distance) : $query;
                })
                ->leftJoin('users', 'users.id', '=', 'animals.location_id')
                ->when($name, function ($query, $name) {
                    return $query->where('name', 'like', '%' . $name . '%');
                })
                ->when($breed, function ($query, $breed) {
                    return $query->where('breed', 'like', '%' . $breed . '%');
                })
                ->when($sex, function ($query, $sex) {
                    return $query->where('sex', $sex);
                })
                ->when($attributes, function ($query, $attributes) {
                    return $query->whereJsonContains('attributes', $attributes);
                })
                ->when(!empty($days_no), function ($query) use ($days){
                    return $query->where('incoming', '>=', $days);
                })
                ->when((!empty($from_age) || !empty($to_age)) && (!empty($date_type_from) || !empty($date_type_to)), function ($query) use ($start, $end) {
                    return $query->whereBetween('dob', [$start, $end])->orderBy('dob', 'DESC');
                })
                ->when(!empty($general_search), function ($query) use ($general_search) {
                    return $query->where('name', 'like', '%' . $general_search . '%');
//                             ->orWhere('breed', 'like', '%' . $general_search . '%');
//                             ->orWhere('sex', 'like', '%' . $general_search . '%')
//                             ->orWhere('year_of_birth', 'like', '%' . $general_search . '%');
                });

        }

        $reservedAnimals = $animalType->animals()
            ->with('status')
            ->with('location')
            ->whereHas('status', function($query) {
               $query->where('name','Reserved');
            })->paginate(4);

//        $adoptionPages = PageType::firstWhere('slug','adoption')->pages;
          $dogAdoptionPages = Page::where('page_type_id', 5)->where('animal_type',1)->orderBy('page_order')->get();
          $catAdoptionPages = Page::where('page_type_id', 5)->where('animal_type',2)->orderBy('page_order')->get();
          $otherAdoptionPages = Page::where('page_type_id', 5)->where('animal_type',3)->orderBy('page_order')->get();
//          dump($catAdoptionPages);

        return view('animals.public.search', [
            'animalType' => $animalType,
            'animalAttributesDogs' => $animalAttributesDogs,
            'animalAttributesCats' => $animalAttributesCats,
            'animals' => $animals->paginate(8)->appends(request()->toArray()),
            'breeds' => $breeds,
            'years' => $years,
            'dogAdoptionPages' => $dogAdoptionPages,
            'catAdoptionPages' => $catAdoptionPages,
            'otherAdoptionPages' => $otherAdoptionPages,
            'reservedAnimals' => $reservedAnimals
        ]);

    }

    public function show($name, Animal $animal): \Illuminate\Http\Response
    {
        // Prepare last visit cookie
        $lastVisits = collect(explode(',', request()->cookie('last_visits')))->prepend($animal->uuid)->unique();
        $lastVisitsCookie = cookie()->forever('last_visits', $lastVisits->join(','));

        // Get last visited animals except the showed one
        $lastVisitedAnimals = Animal::whereIn('uuid', $lastVisits->filter(fn($uuid) => $uuid <> $animal->uuid))
            ->orderByRaw(DB::raw('FIELD(uuid,' . $lastVisits->map(fn($t) => '"' . $t . '"')->join(',') . ')'))
            ->take(5)
            ->get();

        return response()->view('animals.public.show', [
            'animal' => $animal,
            'lastVisitedAnimals' => $lastVisitedAnimals
        ])->withCookie($lastVisitsCookie);
    }
}
