@extends('templates.default')
@section('content')
@include('photographer.cabinet.myprofile.partials.nav')

    
    
   
    
    


      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      
        <div class="max-w-7xl mx-auto bg-white  py-4 px-4 sm:px-6 lg:px-8">

            <div  class="sm:col-span-6 mb-4">
              <div class="max-w-7xl mx-auto">
                <a href="{{back()->getTargetUrl()}}">
                  <div class="inline-block mr-2 mt-2">
                    <button class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">Назад</button>
                   </div>
                </a>
              </div>
              </div>
              <gallery-show></gallery-show>
              
        </div>
      </div>
@endsection