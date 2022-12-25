<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Level;
use App\Models\platform;
use App\Models\Series;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::with(['submittedBy','level'])->take(6)->get();
        $series = Series::take(6)->get();
        return view('welcome',['courses'=>$courses,'series'=>$series]);

    }
    public function  courses(Request $request,$course_type){

        $search = $request->search;
        $level = $request->level;
        $plat  = $request->platform;
        $seriess  = $request->series;
        $duration  = $request->duration;


        $questions = Series::with('courses');

        $route_array = ['courses', 'books'];
        if(!in_array($course_type,$route_array)){
            return abort(404);
        }
        if ($course_type == 'courses'){
            //duration count
            $oneToFive = Course::where('type',0)
                ->where('duration',0)->count();
            $fiveToTen = Course::where('type',0)
                ->where('duration',1)->count();
            $tenPlus = Course::where('type',0)
                ->where('duration',2)->count();

            //courses
            $courses = Course::where('type',0)
                ->where('title','like','%'.$request->search.'%')
                ->when($plat,function($qurey)use($plat){
                    return $qurey->whereIn('platform_id',$plat);
                })
                ->when($duration,function($qurey)use($duration){
                    return $qurey->whereIn('duration',$duration);
                })
                ->when($level,function($qurey)use($level){
                    return $qurey->whereIn('level_id',$level);
                })
                ->with(['platform','topics','submittedBy','level','authors','series'])
                ->when($seriess,function($query)use($seriess){
                    $query->whereHas('series', function($query) use($seriess) {
                        $query->whereIn('series_id', $seriess);
                    });
                })
                ->paginate(10);

            $platform = platform::with(['courses'=>function ($query) {
                $query->where('type', '=', '0');
            }])->get();
            $levels = Level::with(['courses'=>function ($query) {
                $query->where('type', '=', '0');
            }])->get();
            $Series = Series::with(['courses'=>function ($query) {
                $query->where('type', '=', '0');
            }])->get();
        }elseif ($course_type == 'books'){
            //duration count
            $oneToFive = Course::where('type',1)
                ->where('duration',0)->count();
            $fiveToTen = Course::where('type',1)
                ->where('duration',1)->count();
            $tenPlus = Course::where('type',1)
                ->where('duration',2)->count();

            $courses = Course::where('type',1)
                ->where('title','like','%'.$request->search.'%')
                ->when($plat,function($qurey)use($plat){
                    return $qurey->whereIn('platform_id',$plat);
                })
                ->when($duration,function($qurey)use($duration){
                    return $qurey->whereIn('duration',$duration);
                })
                ->when($level,function($qurey)use($level){
                    return $qurey->whereIn('level_id',$level);
                })
                ->with(['platform','topics','submittedBy','level','authors','series'])
                ->when($seriess,function($query)use($seriess){
                    $query->whereHas('series', function($query) use($seriess) {
                        $query->whereIn('series_id', $seriess);
                    });
                })
                ->paginate(10);



            $platform = platform::with(['courses'=>function ($query) {
                $query->where('type', '=', '1');
            }])->get();
            $levels = Level::with(['courses'=>function ($query) {
                $query->where('type', '=', '1');
            }])->get();
            $Series = Series::with(['courses'=>function ($query) {
                $query->where('type', '=', '1');
            }])->get();
            $reviews = platform::with(['courses'=>function ($query) {
                $query->where('type', '=', '1');
            }])->get();
        }

        return view('course.courses',[
            'courses'=>$courses,
            'platform'=>$platform,
            'levels'=>$levels,
            'series'=>$Series,
            'oneToFive'=>$oneToFive,
            'fiveToTen'=>$fiveToTen,
            'tenPlus'=>$tenPlus,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($slug)
    {
        $course = Course::where('slug',$slug)->with(['topics','submittedBy','level','authors','reviews'])->first();
        if (empty($course)){
            return abort(404);
        }
//        return $course;
        return  view('course.single',[
            'course'=>$course,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
