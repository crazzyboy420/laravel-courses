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
    public function  courses(){
        $courses = Course::where('type',0)->with(['platform','topics','submittedBy','level','authors','series'])->paginate(10);
        $platform = platform::with('courses')->get();
        $levels = Level::with('courses')->get();
        $Series = Series::with('courses')->get();

        return view('course.courses',[
            'courses'=>$courses,
            'platform'=>$platform,
            'levels'=>$levels,
            'series'=>$Series,
        ]);
    }
    public function  books(){
        $courses = Course::where('type',1)->with(['platform','topics','submittedBy','level','authors','series'])->paginate(10);
        $platform = platform::with('courses')->get();
        $levels = Level::with('courses')->get();
        $Series = Series::with('courses')->get();

        return view('course.courses',[
            'courses'=>$courses,
            'platform'=>$platform,
            'levels'=>$levels,
            'series'=>$Series,
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
        $course = Course::where('slug',$slug)->with(['platform','topics','submittedBy','level','authors','series'])->first();
        if (empty($course)){
            return abort(404);
        }
        return  view('course.single',[
            'course'=>$course
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
