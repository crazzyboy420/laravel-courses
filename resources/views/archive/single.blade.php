
    <x-guest-layout>
        <div class="bg-gray mt-1 py-6">
            <div class="container">
                <h1 class="text-gray-700 text-center mb-10 font-bold text-3xl mt-12">{{$archive}}</h1>


                <div class="max-w-7xl w-full grid grid-cols-3 gap-10  mx-auto">
                    @foreach($courses as $course)
                        @include('components.course-box',['course'=>$course])
                    @endforeach
                </div>
              <div class="mt-6">
                  {{$courses->links()}}
              </div>
            </div>
        </div>
    </x-guest-layout>


