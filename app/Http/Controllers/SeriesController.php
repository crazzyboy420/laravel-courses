<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index($slug){
        $series = Series::where('slug',$slug)->first();
        $courses = $series->courses()->paginate(12);

        return view('archive.single',['archive'=>$series,'courses'=>$courses]);
    }
}
