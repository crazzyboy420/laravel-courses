
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src="{{asset('js/app.js')}}"></script>
        <!-- Fonts -->
    </head>
    <body>
    <div class="bg-body">
        <div class="{{request()->routeIs('home') ? '':'bg-white border-b border-gray-100 shadow-2'}}">
        <div class="container mx-auto">
            <!--Header Section-->
            <header class="flex h-16 justify-between items-center">
                <div class="flex items-center">
                    <a href="/" class="inline-block">
                        <img class="w-56" src="https://laravel-courses.com/img/logo.png?1.0" alt="Logo">
                    </a>
                    @php
                        $path = request()->path();
                       $path = explode('/', $path);
                    @endphp
                    <nav class="hidden h-16 space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <a href="{{route('courses','courses')}}" class="inline-flex items-center px-1 pt-1 border-b-2 {{$path[0] === 'courses'?'border-indigo-400':'border-transparent'}} text-base font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition">Courses</a>
                        <a href="{{route('courses','books')}}" class="inline-flex items-center px-1 pt-1 border-b-2  {{$path[0] === 'books'?'border-indigo-400':'border-transparent'}} text-base font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition">Books</a>
                    </nav>
                </div>

                <!--Signup&login button-->
                <div class="flex items-center">
                    @if(Auth::check())
                        <div class="ml-3 relative">
                            <div class="relative" x-data="{ open: false }">
                                <div @click="open = ! open">
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{Gravatar::get(Auth::user()->email)}}" alt="{{Auth::user()->name}}">
                                    </button>
                                </div>

                                <div x-show="open" class="absolute z-50 mt-2 w-48 rounded-md shadow-lg origin-top-right right-0" @click="open = false">
                                    <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            Manage Account
                                        </div>

                                        <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition" href="{{route('profile.edit')}}">Profile</a>
                                        <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition" href="#">Submit Course</a>
                                        @if(Auth::user()->role===1)
                                        <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition" href="{{route('dashboard')}}">Dashboard</a>
                                        @endif


                                        <div class="border-t border-gray-100"></div>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{route('logout')}}">
                                            @csrf
                                            <button class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">Log Out</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                    <a href="{{route('login')}}" class="text-sm font-medium text-gray-500 hover:text-gray-900">Sign in</a>
                    <a href="{{route('register')}}" class="ml-8 inline-flex items-center justify-center rounded border border-transparent bg-black px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-500">Sign up</a>
                    @endif
                </div>
            </header>
        </div>
        </div>
            {{ $slot }}
        <!--Forter Section-->
        <footer class="w-full bg-dark pt-[94px] relative">
                <img src="https://laravel-courses.com/img/footer-cure.png" alt="Stylish Design" class="w-auto h-auto object-contain absolute bottom-0 right-0 pointer-events-none z-10">
                <div class="container flex justify-between pb-[50px]">
                    <div>
                        <h2 class="text-lg-primary-2 text-white">Course by Series</h2>
                        <ul class="mt-5">
                            @foreach($series as $series)
                                <li class="mb-2">
                                    <a href="{{route('archive',['series',$series->slug])}}" class="text-links text-gray-100 text-base before:text-gray-100">{{$series->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <h2 class="text-lg-primary-2 text-white">Course by Duration</h2>
                        <ul class="mt-5">
                            <li class="mb-2">
                                <a href="{{route('archive',['duration','1-5-hours'])}}" class="text-links text-gray-100 text-base before:text-gray-100">1-5 hours</a>
                            </li>
                            <li class="mb-2">
                                <a href="{{route('archive',['duration','5-10-hours'])}}" class="text-links text-gray-100 text-base before:text-gray-100">5-10 hours</a>
                            </li>
                            <li class="mb-2">
                                <a href="{{route('archive',['duration','10-plus-hours'])}}" class="text-links text-gray-100 text-base before:text-gray-100">10+ hours</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="text-lg-primary-2 text-white">Course by Level</h2>
                        <ul class="mt-5">
                            @foreach($levels as $level)
                            <li class="mb-2">
                                <a href="{{route('archive',['level',$level->slug])}}" class="text-links text-gray-100 text-base before:text-gray-100">{{$level->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <h2 class="text-lg-primary-2 text-white">Course by Platform</h2>
                        <ul class="mt-5">
                            @foreach($platforms as $platform)
                            <li class="mb-2">
                                <a href="{{route('archive',['platform',$platform->slug])}}" class="text-links text-gray-100 text-base before:text-gray-100">{{$platform->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <h2 class="text-lg-primary-2 text-white">Course by Topics</h2>
                        <ul class="mt-5">
                            @foreach($topics as $topic)
                            <li class="mb-2">
                                <a href="{{route('archive',['topic',$topic->slug])}}" class="text-links text-gray-100 text-base before:text-gray-100">{{$topic->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!--footer bottom -->
                <div class="mx-auto container flex items-center justify-between gap-5 pb-8">
                    <ul class="items-center gap-3 z-50 relative">
                        <li>
                            <a href="#" target="_blank">
                                <svg class="hover:filter hover:brightness-200" xmlns="http://www.w3.org/2000/svg" width="15" height="12" fill="none">
                                    <path fill="#898F92" d="M15 1.412a6.217 6.217 0 0 1-1.764.487 3.043 3.043 0 0 0 1.348-1.68c-.595.353-1.255.6-1.95.741C12.067.353 11.27 0 10.368 0 8.683 0 7.306 1.355 7.306 3.028c0 .24.03.473.08.692A8.79 8.79 0 0 1 1.045.558a2.96 2.96 0 0 0-.415 1.517c0 1.052.538 1.984 1.37 2.513a3.08 3.08 0 0 1-1.399-.353v.021c0 1.469 1.061 2.697 2.467 2.972a3.072 3.072 0 0 1-1.384.05 3.023 3.023 0 0 0 1.09 1.505 3.1 3.1 0 0 0 1.778.598A6.171 6.171 0 0 1 .731 10.68c-.243 0-.487-.014-.731-.042A8.808 8.808 0 0 0 4.718 12c5.65 0 8.755-4.616 8.755-8.619 0-.134 0-.261-.007-.395A6.094 6.094 0 0 0 15 1.412Z"></path>
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <p class="text-sm  text-center text-[#E5E5E580] leading-5 z-50 relative"> Developed by <a href="https://twitter.com/phpfour" target="_blank" class="hover:underline font-medium">Rasel Ahmed⚡️</a></p>
                    <span></span>
                </div>
            </footer>
    </body>
</html>
