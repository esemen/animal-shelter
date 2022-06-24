<?php

namespace App\Http\Controllers;
use App\Models\HomeCheck;
use App\Models\User;
use App\Models\Fosterer;
//use App\Models\Application;
use App\Models\Vetter;
use App\Models\Animal;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): \Illuminate\Contracts\Support\Renderable
    {
        $applications = auth()->user()->applications()->with(['Animal'])->get();
        $fosterer_applications = auth()->user()->fosterer()->get();
        $vetter_applications = auth()->user()->vetter()->get();
        $home_checks = auth()->user()->homeChecks()->get();
        $animals_in_foster = auth()->user()->animals()->get();
        $assessments = auth()->user()->assessment()->with(['User'])->get();
//        dd($animals_in_foster);

        return view('home', [
            'applications' => $applications,
            'fosterer_applications' => $fosterer_applications,
            'animals_in_foster' => $animals_in_foster,
            'vetter_applications' => $vetter_applications,
            'assessments' => $assessments,
            'home_checks' => $home_checks
        ]);
    }

    public function pets()
    {
        $data = [];
//        $data = DB::table('animal')->join('app_relations', 'app_relations.pet_id', '=', 'animal.id')
//                                   ->join('users', 'users.id', '=', 'app_relations.user_id')
//                                   ->where('users.id', Auth::User()->id)
//                                   ->select('animal.*')->get();
        return view('home', compact('data'));
    }

    /**
     * Update application after the addopter completes the details
     * */
    // protected function update(array $data)
    // {
    //     $application = DB::table('applications')
    //                       ->where('aid', $data['aid'])
    //                       ->update([
    //                         'title'=>$data['title'],
    //                         'appname'=> $data['firstname'],
    //                         'surname' => $data['lastname'],
    //                         'address1'=> $data['address1'],
    //                         'address2'=>$data['address2'],
    //                         'address3'=>$data['address3'],
    //                         'town'=>$data['town'],
    //                         'county'=>$data['county'],
    //                         'postcode'=>$data['postcode'],
    //                         'email'=>$data['email'],
    //                         'telephone'=>$data['landline'],
    //                         'mobile'=>$data['mobile'],
    //                         'did'=>$data['did'],
    //                       ]);
    // }

}
