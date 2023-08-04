<?php

namespace App\Http\Controllers\Example;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FirstController extends Controller
{

    // __index method__ //
    public function index()
    {
        return view('about');
    }
    public function country()
    {
        return view('country');
    }

    //__student store__//
    public function Studentstore(Request $request)
    {
        // dd($request->name);
        // dd($request->collect()['name']);
        // data gula niye databese e pass korte hobe
        // success message
        // redirect kore onno jaygay pathay dite hobe (all contact)

        $data = [];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;

        // database e store

        // return redirect()->route('about.us');
        // return redirect()->action([SecondController::class, 'test']);
        // return redirect()->away('https://www.google.com');
        return redirect()->back()->with('success', 'Student Inserted!');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:55',
            'email' => 'required|max:80|email',
            'password' => 'required|max:12|min:6|password',

        ]);
        // Insert data into database (query)

        // log file touch, the record on log file

        // dd($request->all());
        \Log::channel('contactstore')->info('The contact form submitted by ' . rand(1, 20));
        return redirect()->back();
    }

    public function laravel()
    {
        // return View::make("laravel",['name'=> 'Sujon']);
        if (view()->exists('laravel')) {
            return View::make("laravel", ['name' => 'Sujon']);

        } else {
            echo "Not available";
        }
    }
}
