@extends('templates.default')
@section('content')


      <div id="app" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <p class="my-2 text-2xl leading-8 font-bold tracking-tight text-gray-900 sm:text-3xl">
          Редактирование профиля
      </p>
        <div class="max-w-7xl mt-6 rounded-lg mx-auto bg-white py-12 px-4 sm:px-6 lg:px-8">
          <div class="max-w-3xl mx-auto">
            
      
        <div class="space-y-8  divide-y divide-gray-200">
          <div>
            <div>
              <h3 class="text-lg leading-6 font-medium text-gray-900">
                Профиль
              </h3>
              <p class="mt-1 text-sm text-gray-500">
                @if($type == 2)
                Расскажите подробно о себе, добавьте ссылки на профили в соц. сетях и мессенджерах, чтобы клиенты смогли получше вас узнать
                @endif
            </p>
            </div>
    
            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-6">
               
                <label for="photo" class="block text-sm font-medium text-gray-700">
                  Фото профиля
                  <div id="app"> 
                    <ava-upload></ava-upload>
                </div>
                  

                </label>
                
              </div>
              
              <div class="sm:col-span-6">
          
                
                  
                <label for="about" class="block text-sm font-medium text-gray-700">
                  О себе
                </label>
                @if($type == 2)
                <p class="mt-2 text-sm text-gray-500">Напишите коротко о ваших сильных сторонах, важных качествах, какие инструменты и технологии используете.</p>
                @endif
                <div class="mt-1">
                  <textarea id="about" name="about" rows="3" class="w-full px-3 py-2 text-gray-700 border border-indigo-300 focus:border-indigo-500 rounded-lg focus:outline-none"></textarea>
                </div>
               
              </div>
    
           
    
   
            </div>
          </div>
          <form class="form-horizontal" method="POST" action="{{ route('profile.edit') }}">
            {{ csrf_field() }}
          <div class="pt-8">
            <div>
              <h3 class="text-lg leading-6 font-medium text-gray-900">
                Личная информация
              </h3>
             
            </div>
            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

              <div class="sm:col-span-2">
                <label for="first_name" class="block text-sm font-medium text-gray-700">
                  Имя
                </label>
                <div class="mt-1">
                  <input id="first_name" type="text" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" name="first_name" value="{{old('first_name', Auth::user()->first_name ?? '') }}" required>
                </div>
              </div>
             
              <div class="sm:col-span-2">
                <label for="last_name" class="block text-sm font-medium text-gray-700">
                  Фамилия
                </label>
                <div class="mt-1">
                  <input id="last_name" type="text" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" name="last_name" value="{{old('last_name', Auth::user()->last_name ?? '') }}" required>                
                </div>
              </div>

              <div class="sm:col-span-2">
                <label for="dr" class="block text-sm font-medium text-gray-700">
                  Дата рождения
                </label>
                <div class="mt-1">
                  <input id="dr" v-mask="'####-##-##'" type="data" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" name="dr" value="{{old('dr', Auth::user()->dr ?? '') }}" >                
                </div>
              </div>
    
              <div class="sm:col-span-2">
                <label for="email" class="block text-sm font-medium text-gray-700">
                  Email 
                </label>
                <div class="mt-1">
                  <input id="email" type="email" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" name="email" value="{{old('email', Auth::user()->email ?? '') }}" required>                
                </div>
              </div>
    
              <div class="sm:col-span-2">
                <label for="city" class="block text-sm font-medium text-gray-700">
                  Город
                </label>
                <div class="mt-1">
                  <input id="city" type="text" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" name="city" value="{{ old('city', Auth::user()->city ?? '')  }}" >                
                </div>
              </div>

              <div class="sm:col-span-2">
                <label for="phone" class="block text-sm font-medium text-gray-700">
                  Телефон
                </label>
                <div class="mt-1">
                  <input id="phone" v-mask="'+# ###-###-##-##'" type="text" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" name="phone" value="{{old('phone', Auth::user()->phone ?? '') }}" >                
                </div>
              </div>
             
           
              <div class="sm:col-span-6">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <span class="block text-sm text-red-700">{{ $error }}</span>
                        @endforeach
                    </ul>
                </div>
            @endif

              
          
            </div>
          
          
            </div>
            <div class="pt-5">
              <div class="flex justify-end">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Сохранить
                </button>
         
              
              </div>
            </div>
          </form>
          </div>
    
     
        </div>
    
      
    
          </div>
        </div>
      
          </div>
@endsection