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
              <label for="cover_photo" class="mb-2 block text-sm font-medium text-gray-700">
                Загрузите фотографии
              </label>
{{-- <image-upload :urldata="{{json_encode($url_data)}}">
 
</image-upload> --}}

<create-album></create-album>
<hr>
<album-index></album-index>

            </div>

              </div>
       {{--  <lightbox></lightbox>   --}}
          <div class="max-w-7xl mx-auto">
           
            <div class="grid gap-8 row-gap-5 mb-8 sm:grid-cols-2 lg:grid-cols-4 sm:mx-auto">
                <img class="object-cover w-full h-44 rounded shadow-lg" src="{{ asset('/') . Auth::user()->userprofile->thumbnail }}" alt="" />
                <img class="object-cover w-full h-44 rounded shadow-lg" src="https://images.pexels.com/photos/3182746/pexels-photo-3182746.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=750&amp;w=1260" alt="" />
                <img class="object-cover w-full h-44 rounded shadow-lg" src="https://images.pexels.com/photos/3184311/pexels-photo-3184311.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;w=500" alt="" />
                <img class="object-cover w-full h-44 rounded shadow-lg" src="https://images.pexels.com/photos/3184339/pexels-photo-3184339.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=750&amp;w=1260" alt="" />
             <img class="object-cover w-full h-44 rounded shadow-lg" src="https://images.pexels.com/photos/3184339/pexels-photo-3184339.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=750&amp;w=1260" alt="" /> 
            </div>
    
          </div>
        </div>
      
    












          

@endsection