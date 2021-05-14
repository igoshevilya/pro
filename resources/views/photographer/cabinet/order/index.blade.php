@extends('templates.default')
@include('photographer.cabinet.partials.nav')
@section('content')







    

<div class="max-w-7xl mx-auto my-4 sm:px-6 lg:px-8">
<p class="mt-2 text-3xl leading-8 font-bold tracking-tight text-gray-900 sm:text-4xl">
    Заказы
  </p>
</div>
<div class="mt-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
    <section aria-labelledby="timeline-title" class="lg:col-start-3 lg:col-span-1 ">
        <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
          <h2 id="timeline-title" class="text-lg font-medium text-gray-900">Фильтр</h2>
  
          <!-- Activity Feed -->
          <div class="mt-6 flow-root">
            <ul class="-mb-8">
              
            </div>
        </div>
      </section> 
      
      
      
      <div class="space-y-6 lg:col-start-1 lg:col-span-2">
      <!-- Description list-->
      
      <section aria-labelledby="applicant-information-title">
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
              <dl class="grid grid-cols-1 gap-x-4 gap-y-2 sm:grid-cols-4">
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
                  <dd class="mt-1 text-sm text-gray-900 truncate ">
                    Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.
                  </dd>
                </div>
               
              </dl>
              <div class="mt-4 flex justify-end">
                <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                    Подробнее
                  </button>
            </div>
            </div>
           
             
           
          </div>
      </section>


     
    </div>

   
  </div>












          

@endsection