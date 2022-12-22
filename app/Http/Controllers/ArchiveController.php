<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Level;
use App\Models\platform;
use App\Models\Series;
use App\Models\Topic;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function archive($type,$slug){
        $allows_type = ['series','platform','level','duration','topic'];
        if (!in_array($type,$allows_type)){
            return abort(404);
        }

        if ($type === 'level'){
            $items = Level::where('slug',$slug)->first();
            if (empty($items)){
                return abort(404);
            }
            $name = $items->name;
            $courses = $items->courses()->paginate(12);
        }elseif ($type === 'series'){
            $items = Series::where('slug',$slug)->first();
            if (empty($items)){
                return abort(404);
            }
            $name = $items->name;
            $courses = $items->courses()->paginate(12);
        }elseif ($type === 'platform'){
            $items = platform::where('slug',$slug)->first();
            if (empty($items)){
                return abort(404);
            }
            $name = $items->name;
            $courses = $items->courses()->paginate(12);
        }elseif ($type === 'topic'){
            $items = Topic::where('slug',$slug)->first();
            if (empty($items)){
                return abort(404);
            }
            $name = $items->name;
            $courses = $items->courses()->paginate(12);
        }elseif ($type === 'duration'){
            if ($slug == '1-5-hours'){
                $duration = 0;
                $name = '1-5 hours';
            }elseif ( $slug == '5-10-hours'){
                $duration = 1;
                $name = '5-10 hours';
            }elseif ($slug == '10-plus-hours'){
                $duration = 2;
                $name = '10+ hours';
            }else{
                $duration = null;
                $name = null;
            }
            $courses = Course::where('duration',$duration)->paginate(12);
            if (empty($courses)){
                return abort(404);
            }

        }

        return view('archive.single',['archive'=>$name,'courses'=>$courses]);
    }
}
