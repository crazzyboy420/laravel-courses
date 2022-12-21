<?php

namespace App\Http\Controllers;

use App\Models\platform;
use Illuminate\Http\Request;

class PlatformContrller extends Controller
{
    public function index($slug){
        $topic_course = platform::where('slug',$slug)->with('courses')->first();

        return view('archive.single',['archive'=>$topic_course]);
    }
}
