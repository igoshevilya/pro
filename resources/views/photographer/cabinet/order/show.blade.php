@extends('templates.default')
@include('photographer.cabinet.partials.nav')
@section('content')







    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class=" px-4 my-1 sm:px-6 lg:px-8 py-4 bg-white shadow sm:rounded-md">
        <div class="max-w-7xl mx-auto">
          
            <div class="inline-block">
              <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">Назад</button>
             </div>
    
        </div>
      </div>
    </div>




      
    <div class="max-w-7xl mx-auto py-2 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
          
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
      <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
          Название проекта
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
          Категория
        </p>
      </div>
      <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-4">
            <div class="sm:col-span-1">
                <a href="#" class="flex-shrink-0 group block">
                    <div class="flex items-center">
                      <div>
                        <img class="inline-block h-9 w-9 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="">
                      </div>
                      <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">
                          Tom Cook
                        </p>
                        
                      </div>
                    </div>
                  </a>
              </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
              Дата съёмки
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              14 мая 2021
            </dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
              Локация
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              Симферополь
            </dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
              Стоимость съёмки
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              1000 Р
            </dd>
          </div>
          <div class="sm:col-span-4">
            <dt class="text-sm font-medium text-gray-500">
              Описание
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.
            </dd>
          </div>
         
        </dl>
      </div>
      <div class="px-4 py-5 sm:p-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
         Откликнуться на заказ
        </h3>
        
          <div class="mt-2">
           <textarea class="w-full px-3 py-2 text-gray-700 border border-indigo-300 focus:border-indigo-500 rounded-lg focus:outline-none" rows="4"></textarea>
        <div class="mt-2 flex justify-end">
            <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                Откликнуться
              </button>
        </div>
      </div>
    </div>
    <div class="px-4 m-6 sm:p-6 border sm:rounded-lg">
      <h3 class="text-lg leading-6 font-medium text-gray-900">
        Ваше приедложение
      </h3>
      <div class="mt-2 max-w-xl text-sm text-gray-500">
        <p>
          Once you delete your account, you will lose all data associated with it.
        </p>
      </div>
      <div class="mt-5">
        <button class="inline-flex items-center justify-center w-10 h-10 mr-2 text-gray-700 transition-colors duration-150 bg-white rounded-full focus:shadow-outline hover:bg-gray-200"><svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg></button>
        <button type="button" class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:text-sm">
          Удалить
        </button>  
        </div>
    </div>
    




   




        </div>
      </div>






          

@endsection