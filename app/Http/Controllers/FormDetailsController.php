<?php

namespace App\Http\Controllers;

use App\FormDetails;
use Illuminate\Http\Request;
// use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use DB;
class FormDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('home/details');
    }

    public function home() {
        return view('home');
    }

    public function addDetails(Request $request)
    {
        FormDetails::create(
            $request->all()
        );
        return redirect('home')->with('message', 'Adoption form submitted');

    }

    public function forms()
    {
        $data = DB::table('form_details')->select('*')->where('form_type', 'dog')->where('user_id', Auth::User()->id)->get();
        // dd($data);
        // return view('home/partials/dog_completed', ["data" => $data]);
        return view("home/forms", [
            "data" => $data,
        ]);
    }
}
