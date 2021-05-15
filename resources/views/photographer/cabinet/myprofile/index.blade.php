@extends('templates.default')
@include('photographer.cabinet.partials.nav')
@section('content')







    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class=" px-4 my-1 sm:px-6 lg:px-8 py-4 bg-white shadow sm:rounded-md">
        <div class="max-w-7xl mx-auto">
          
      <div>
        <div class="sm:hidden">
          <label for="tabs" class="sr-only">Select a tab</label>
          <select id="tabs" name="tabs" class="block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
            <option>Портфолио</option>
            <option>Услуги</option>
            <option selected="">Информация</option>           
          </select>
        </div>
        <div class="hidden sm:block">
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
      
        <div class="max-w-7xl mx-auto bg-white py-12 px-4 sm:px-6 lg:px-8">
          <div class="max-w-3xl mx-auto">
            
      <form class="space-y-8 divide-y divide-gray-200">
        <div class="space-y-8 divide-y divide-gray-200">
          <div>
            <div>
              <h3 class="text-lg leading-6 font-medium text-gray-900">
                Профиль
              </h3>
              <p class="mt-1 text-sm text-gray-500">
                Расскажите подробно о себе, добавьте ссылки на профили в соц. сетях и мессенджерах, чтобы клиенты смогли получше вас узнать
              </p>
            </div>
    
            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-6">
                <label for="photo" class="block text-sm font-medium text-gray-700">
                  Фото профиля
                </label>
                <div class="mt-1 flex items-center">
                  <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                    <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                  </span>
                  <button type="button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Загрузить
                  </button>
                </div>
              </div>
              <div class="sm:col-span-6">
                <label for="about" class="block text-sm font-medium text-gray-700">
                  О себе
                </label>
                <p class="mt-2 text-sm text-gray-500">Напишите коротко о ваших сильных сторонах, важных качествах, какие инструменты и технологии используете.</p>
                <div class="mt-1">
                  <textarea id="about" name="about" rows="3" class="w-full px-3 py-2 text-gray-700 border border-indigo-300 focus:border-indigo-500 rounded-lg focus:outline-none"></textarea>
                </div>
               
              </div>
    
           
    
   
            </div>
          </div>
    
          <div class="pt-8">
            <div>
              <h3 class="text-lg leading-6 font-medium text-gray-900">
                Личная информация
              </h3>
              <p class="mt-1 text-sm text-gray-500">
                Используйте постоянный адрес, по которому вы можете получать почту.
              </p>
            </div>
            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label for="first_name" class="block text-sm font-medium text-gray-700">
                  Имя
                </label>
                <div class="mt-1">
                  <input type="text" name="first_name" id="first_name" autocomplete="given-name" class=" border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none">
                </div>
              </div>
    
              <div class="sm:col-span-3">
                <label for="last_name" class="block text-sm font-medium text-gray-700">
                  Фамилия
                </label>
                <div class="mt-1">
                  <input type="text" name="last_name" id="last_name" autocomplete="family-name" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none">
                </div>
              </div>
    
              <div class="sm:col-span-3">
                <label for="email" class="block text-sm font-medium text-gray-700">
                  Email 
                </label>
                <div class="mt-1">
                  <input id="email" name="email" type="email" autocomplete="email" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none">
                </div>
              </div>
    
              <div class="sm:col-span-3">
                <label for="country" class="block text-sm font-medium text-gray-700">
                  Город
                </label>
                <div class="mt-1">
                  <input type="text" name="sity" id="sity" autocomplete="sity" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none">
                </div>
              </div>
    
             
            </div>
          </div>
    
     
        </div>
    
        <div class="pt-5">
          <div class="flex justify-end">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Сохранить
            </button>
            <button type="button" class="ml-3 bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Отмена
            </button>
          
          </div>
        </div>
      </form>
    
          </div>
        </div>
      
          </div>












          

@endsection