@extends('templates.default')
@include('photographer.cabinet.partials.nav')
@section('content')







    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class=" px-4 my-1 sm:px-6 lg:px-8 py-4 bg-white shadow sm:rounded-md">
        <div class="max-w-7xl mx-auto">
          <a href="{{back()->getTargetUrl()}}">
            <div class="inline-block mr-2 mt-2">
              <button class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">Назад</button>
             </div>
          </a>
        </div>
      </div>
    </div>




      
    <div class="max-w-7xl mx-auto py-2 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
          
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
      <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
          {{ $order->title }}
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
          {{ $order->getCategoryOrder() }}
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
                          {{$order->user->getName()}}
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
              {{ $order->date }}
            </dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
              Локация
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              {{ $order->location }}
            </dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
              Стоимость съёмки
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              {{ $order->price }} ₽
            </dd>
          </div>
          <div class="sm:col-span-4">
            <dt class="text-sm font-medium text-gray-500">
              Описание
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
              {{ $order->description }} </dd>
          </div>
         
        </dl>
      </div>
@if($order->responses->status==2)
@if($order->reviews->text)
      <div class="px-4 py-5 sm:p-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
          Отзыв клиента
        </h3>
        <div class="mt-2 max-w-xl text-sm text-gray-700">
          <p>
            {{ $order->reviews->text}}
        
          </p>
        </div>
        
        @endif
        <div class="mt-4">
          <h3 class="text-lg leading-6 font-medium text-gray-900">
            Оставить отзыв о клиенте 
          </h3>
          
            <div class="mt-2">
              <form class="form-horizontal" method="POST" action="{{ route('order.storeresponse', $order->id) }}">
                {{ csrf_field() }}            
          
             <textarea id="description" name="description" value="{{ old('description') }}" class="w-full px-3 py-2 text-gray-700 border border-indigo-300 focus:border-indigo-500 rounded-lg focus:outline-none" ></textarea>
          <div class="mt-2 flex justify-end">
              <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                  Отправить
                </button>
          </div>
        </form>
        
        </div>
      </div>




      @endif

    </div>
  
    <div class="px-4 sm:p-6 border sm:rounded-lg bg-white">
      <h3 class="text-lg leading-6 font-medium text-gray-900">
       
        Ваше приедложение
      </h3>
      {{ $order->responses->description }}
     
     
    </div>




   




        </div>
        


      </div>
      



          

@endsection