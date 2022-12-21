<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard(){
        if (Auth::user()->role === 1){
            return view('dashboard');
        }else{
           return redirect('/');
        }
    }
}
