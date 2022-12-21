<?php

namespace App\Http\Controllers;

use App\Models\platform;
use Illuminate\Http\Request;

class PlatformContrller extends Controller
{
    public function index($slug){
        $platform = platform::where('slug',$slug)->first();
        $courses = $platform->courses()->paginate(12);

        return view('archive.single',['archive'=>$platform,'courses'=>$courses]);
    }
}
