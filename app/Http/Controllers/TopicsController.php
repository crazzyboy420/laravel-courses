<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicsController extends Controller
{
    public function index($slug){
        $topic_course = Topic::where('slug',$slug)->first();
        $courses = $topic_course->courses()->paginate(12);

       return view('archive.single',['archive'=>$topic_course,'courses'=>$courses]);
    }
}
