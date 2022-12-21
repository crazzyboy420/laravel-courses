<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicsController extends Controller
{
    public function index($slug){
        $topic_course = Topic::where('slug',$slug)->with('courses')->first();

       return view('archive.single',['archive'=>$topic_course]);
    }
}
