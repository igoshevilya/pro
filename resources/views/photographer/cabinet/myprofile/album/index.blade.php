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
              <p class="mt-2 text-2xl leading-8 font-bold tracking-tight text-gray-900 sm:text-2xl">
                Ваши альбомы
 
            

              </div>
  

              <section class=" ">
                <button onclick="document.getElementById('myModal').showModal()" id="btn" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">Создать альбом</button>
              </section>
     

          <div class="max-w-7xl mx-auto">
            
            <div class="mt-3 grid gap-8 row-gap-5 mb-8 sm:grid-cols-2 lg:grid-cols-4 sm:mx-auto">
              @foreach ($albums as $album)
              <a href="{{route('album.show', $album->id )}}">
              <div class="object-cover w-full h-44 rounded">
                <img class="object-cover w-full h-44 rounded " src="{{ asset('/') . Auth::user()->userprofile->thumbnail }}" alt="" />
              <p>{{$album->title}}</p>
              </div></a>
               @endforeach
            </div>
    
          </div>
        </div>
      </div>
    

     
      <dialog id="myModal" class=" w-11/12 md:w-1/2 p-5  bg-white rounded-md ">
            
        <div class="flex flex-col w-full h-auto ">
             <!-- Header -->
             <div class="flex w-full h-auto justify-center items-center">
               <div class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
                     Создание альбома
               </div>
               <div onclick="document.getElementById('myModal').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
               </div>
               <!--Header End-->
             </div>
               <!-- Modal Content-->

               <div class="px-10">
                  <form class="form-horizontal" method="POST" action="{{ route('album.store') }}">
                    {{ csrf_field() }}
                        
                        <div class="mb-6">
                            <label for="title" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Название альбома</label>
                            <input type="text" name="title" id="title" placeholder="Название альбома" required="" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none">
                        </div>
                        <div class="mb-6">
                          <label for="desc" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Описание</label>
                            <textarea rows="5" name="desc" id="desc" placeholder="Описание" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" required=""></textarea>
                        </div>
                        <div class="mb-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Создать альбом</button>
                        </div>
                        <p class="text-base text-center text-gray-400" id="result">
                        </p>
                    </form>
               
            </div>
              
             </div>
     </dialog>






          

@endsection