<x-guest-layout :courses="$courses">
   <div class="container mx-auto">
       <!--Hero Section-->
       <div>
           <form action="" class="mt-20">
               <div class="w-full relative max-w-[860px] mx-auto px-5 pb-[138px] pt-24">
                   <div class="w-full mx-auto flex flex-col items-center justify-center">
                       <h1 class="text-center w-full mx-auto heading-primary mb-3"> The best Courses and Books on the <span class="text-orange">Laravel</span> ecosystem </h1>
                       <p class="text-secoundery-color w-full text-lg text-center my-4 mb-10"> Find the right books and courses on the Laravel framework and related topics to suite your level of expertise. Know how good a course is through your peers review and share your own too. </p>

                       <!--Search Form-->
                       <div class="flex w-[700px] gap-x-6">
                           <input type="search" name="keyword" placeholder="Enter keywords to search courses" class="w-4/5 bg-white h-12 border input-focus border-orange rounded-lg px-3.5 outline-none" required>
                           <button type="submit" class="btn-primary w-1/5 text-white"> Search </button>
                       </div>
                   </div>
                   <!--hero icon-->
                   <img src="https://laravel-courses.com/img/left-top-angle.png" alt="angle" class="absolute pointer-events-none top-[150px] -left-28">
                   <img src="https://laravel-courses.com/img/left-bottom-angle.png" alt="angle" class="absolute  pointer-events-none top-[370px] -left-12">
                   <img src="https://laravel-courses.com/img/right-angle.png" alt="angle" class="absolute pointer-events-none top-[70px] -right-6">
                   <img src="https://laravel-courses.com/img/right-bottom-angle.png" alt="angle" class="absolute   pointer-events-none top-[360px] -right-24">
               </div>
           </form>
           <img src="https://laravel-courses.com/img/right-center-angle.png" alt="angle" class="w-auto h-auto object-contain absolute top-1/2 -translate-y-1/2 right-10 pointer-events-none">
       </div>



       <!--Brand Logo Section-->
       <div>
           <ul class="flex items-center flex-nowrap justify-between gap-y-7 gap-3">
               @foreach($series as $item)
               <li class="w-full lg:max-w-[165px]">
                   <a href="#" class="bg-white border mx-auto border-orange box-shadow w-full h-12 md:h-16 rounded-lg flex items-center justify-center">
                       <img src="{{$item->url}}" alt="{{$item->name}}" class="w-20 md:w-auto max-h-12 h-auto object-contain">
                   </a>
               </li>
               @endforeach
           </ul>
       </div>
       <!--Feature Section-->
       <section class="mt-20 lg:mt-[140px]">
           <h1 class="heading-tertiory text-center mb-10 md:mb-16"> Featured Courses </h1>
           <div class="max-w-7xl w-full inline-flex single-feature gap-10 flex-wrap mx-auto">
               @foreach($courses as $course)
               <div class="bg-white rounded grap-10 overflow-hidden shadow-card">
                   <a href="single.html">
                       <img src="{{$course->image_url}}" alt="{{$course->title}}" class="w-full h-auto object-contain">
                   </a>
                   <div class="px-6 pb-5">
                       <div class="mt-7 flex justify-between items-center gap-4 mb-4">
                           <a href="single.html" class="text-lg-primary w-full hover:underline">{{$course->title}}</a>
                       </div>
                       <div>
                           <div class="flex items-center ">
                               <div class="inline-block w-7 h-7">
                                   <img  src={{ Gravatar::get($course->submittedBy->email)}} alt="" class="object-contain flex shrink-0 rounded-full">
                               </div>
                               <h4 class="text-sm-primary inline-block w-full leading-5 ml-2">{{$course->submittedBy->name}}</h4>
                           </div>
                           <div class="mt-3">
                               <div class="flex items-center gap-3 mt-6">
                                   <p class="bg-parrot-100 text-sm-primary py-1.5 px-1.5 rounded-[3px] flex items-center gap-1.5 w-max">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none">
                                           <path fill="#464646" d="M7.493 0A7.08 7.08 0 0 0 .417 7.083a7.08 7.08 0 0 0 7.076 7.084 7.088 7.088 0 0 0 7.09-7.084A7.087 7.087 0 0 0 7.493 0ZM7.5 12.75a5.665 5.665 0 0 1-5.667-5.667A5.665 5.665 0 0 1 7.5 1.417a5.665 5.665 0 0 1 5.667 5.666A5.665 5.665 0 0 1 7.5 12.75Zm-.156-9.208h-.042a.508.508 0 0 0-.51.51v3.343c0 .248.127.482.347.61l2.94 1.763a.505.505 0 0 0 .763-.358.502.502 0 0 0-.247-.513l-2.74-1.63V4.053a.508.508 0 0 0-.51-.51Z"></path>
                                       </svg> {{ $course->getDuration($course->duration)}}
                                   </p>
                                   <p class="text-sm-primary bg-accent-100 py-1.5 px-1.5 rounded-[3px] flex items-center gap-1.5 w-max">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="15" height="13" fill="none">
                                           <path fill="#464646" d="M14.063 12.188h-3.75V0h3.75v12.188Zm-2.813-.938h1.875V.937H11.25V11.25Zm-1.875.938h-3.75V3.75h3.75v8.438Zm-2.813-.938h1.875V4.687H6.563v6.563Zm-1.875.938H.938V6.561h3.75v5.625Zm-2.812-.938H3.75V7.5H1.875v3.75Z"></path>
                                       </svg>{{$course->level->name}}
                                   </p>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               @endforeach
           </div>
           <div class="flex justify-center mt-12 mb-12">
               <a href="https://laravel-courses.com/courses">
                   <button class="btn-primary text-white h-14 w-32"> Browse all </button>
               </a>
           </div>
       </section>
   </div>
</x-guest-layout>
