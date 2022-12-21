<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index($slug){
        $series = Series::where('slug',$slug)->with('courses')->first();

        return view('archive.single',['archive'=>$series]);
    }
}
