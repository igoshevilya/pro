@extends('templates.default')
@include('photographer.cabinet.partials.nav')
@section('content')


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class=" px-4 my-1 sm:px-6 lg:px-8 py-4 bg-white shadow sm:rounded-md">
        <div class="max-w-7xl mx-auto">
          
      <div>
      
        <div class="">
          <nav class="flex space-x-4  place-content-center" aria-label="Tabs">
            <a href="#" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md">
                Портфолио
            </a>
            <a href="#" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md">
                Услуги
            </a>
            <!-- Current: "bg-indigo-100 text-indigo-700", Default: "text-gray-500 hover:text-gray-700" -->
            <a href="#" class="bg-indigo-100 text-indigo-700 px-3 py-2 font-medium text-sm rounded-md" aria-current="page">
                Информация
            </a>
        
          </nav>
        </div>
      </div>
    
        </div>
      </div>
    </div>

    
    
   
    
    


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