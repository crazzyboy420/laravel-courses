<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelsController extends Controller
{
    public function index($slug){
        $level = Level::where('slug',$slug)->first();
        $courses = $level->courses()->paginate(12);

        return view('archive.single',['archive'=>$level,'courses'=>$courses]);
    }
}
