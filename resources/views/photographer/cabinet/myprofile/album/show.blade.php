@extends('templates.default')
@include('photographer.cabinet.partials.nav')
@section('content')


@include('photographer.cabinet.myprofile.partials.nav')

    
    
   
    
    


      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      
        <div class="max-w-7xl mx-auto bg-white  py-4 px-4 sm:px-6 lg:px-8">
          <a href="{{back()->getTargetUrl()}}">
            <div class="inline-block">
              <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">Назад</button>
             </div>
          </a>

            <div  class="sm:col-span-6 mb-4">
              <p class="mt-2 text-2xl leading-8 font-bold tracking-tight text-gray-900 sm:text-2xl">
            
              </p>
            

              </div>
              <image-upload />
 
              
     

          <div class="max-w-7xl mx-auto">
            
            <div class="mt-3 grid gap-8 row-gap-5 mb-8 sm:grid-cols-2 lg:grid-cols-4 sm:mx-auto">
             {{--  @foreach ($albums as $album)<a href="{{route('album.show', $album->id )}}">
              <div class="object-cover w-full h-44 rounded">
                <img class="object-cover w-full h-44 rounded " src="{{ asset('/') . Auth::user()->userprofile->thumbnail }}" alt="" />
              <p>{{$album->title}}</p>
              </div></a>
               @endforeach --}}
            </div>
    
          </div>
        </div>
      </div>
    

     
      






          

@endsection