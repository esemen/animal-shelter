<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalStatus;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('animal.view');

        $animals = Animal::select(['id', 'name', 'sex', 'dob', 'incoming', 'microchip1', 'neutered', 'neuter_due', 'animal_type_id', 'animal_status_id', 'location_email'])
            ->with('type:id,name', 'status:id,name', 'location:email,title,first_name,last_name,town,county')
            ->get();


        return response()->view("admin.animals.index", compact("animals"));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filterByStatus(AnimalStatus $status)
    {
        $this->authorize('animal.view');

        $animals = $status->animals;

        return response()->view("admin.animals.index", ['animals' => $animals, 'animalStatus' => $status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('animal.edit');

        return response()->view("admin.animals.create");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Animal $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        $this->authorize('animal.view');

        return response()->view('admin.animals.show', ['animal' => $animal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Animal $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        $this->authorize('animal.edit');
        return response()->view('admin.animals.edit', ['animal' => $animal]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Animal $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        $this->authorize('animal.delete');

        $animal->delete();

        return redirect()->back();
    }
}
