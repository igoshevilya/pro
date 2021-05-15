@extends('templates.default')
@include('client.partials.nav')
@section('content')


<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div class=" px-4 my-1 sm:px-6 lg:px-8 py-4 bg-white shadow sm:rounded-md">
      <div class="max-w-7xl mx-auto">
        
    <div>
      <div class="sm:hidden">
        <label for="tabs" class="sr-only">Select a tab</label>
        <select id="tabs" name="tabs" class="block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
          <option>Вы откликнулись</option>
          <option>В работе</option>
          <option selected="">История</option>           
        </select>
      </div>
      <div class="hidden sm:block">
        <nav class="flex space-x-4  place-content-center" aria-label="Tabs">
          <a href="#" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md">
              Вы откликнулись
          </a>
          <a href="#" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md">
              В работе
          </a>
          <!-- Current: "bg-indigo-100 text-indigo-700", Default: "text-gray-500 hover:text-gray-700" -->
          <a href="#" class="bg-indigo-100 text-indigo-700 px-3 py-2 font-medium text-sm rounded-md" aria-current="page">
              История
          </a>
      
        </nav>
      </div>
    </div>
  
      </div>
    </div>
  </div>




    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    
      <div class="bg-white shadow overflow-hidden sm:rounded-md">
        <ul class="divide-y divide-gray-200">
          @foreach ($orders as $order)
            <li>
              <a href="#" class="block hover:bg-gray-50">
                <div class="px-4 py-4 sm:px-6">
                  <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-indigo-600 truncate">
                      {{ $order->title }}
                    </p>
                    <div class="ml-2 flex-shrink-0 flex">
                      <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        {{ $order->getCategoryOrder() }}
                      </p>
                    </div>
                  </div>
                  <div class="mt-2 sm:flex sm:justify-between">
                    <div class="sm:flex">
                      
                      <p class="flex items-center text-sm text-gray-500">
                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" x-description="Heroicon name: solid/calendar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                        </svg>
                                         
                                            Дата съёмки:
                                            <!-- space -->
                                            <time>&nbsp{{ $order->date }}</time>
                                          </p>
                                       
                      <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" x-description="Heroicon name: solid/location-marker" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
      <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
    </svg>
    {{ $order->location }}
                      </p>
                   
                  
                    </div>
                    <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                      <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" x-description="Heroicon name: solid/calendar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
      <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
    </svg>
                      <p>
                        Размещено:
                        <!-- space -->
                        <time datetime="2020-01-07">{{ $order->created_at->diffForHumans()}}</time>
                      </p>
                    </div>
                  </div>
                </div>
              </a>
            </li>
            @endforeach
           
          
        </ul>
        {{ $orders->links() }}
      </div>
    
        </div>





    <p>This is my body content2.</p>
    <a class="btn btn-primary" href="{{route('order.store')}}" role="button">Создать задание</a>

    
    @foreach ($orders as $order)
  

    
    <div class="card my-1">
        <div class="card-header">
          
            <h5 class="modal-title">{{ $order->title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $order->getCategoryOrder() }}</h6>
           
      </div>
        <div class="card-body">
         
          <p class="card-text">{{ $order->description }}</p>
          <p class="card-text">{{ $order->getUserOrder() }}</p>
          <p class="card-text">{{ $order->location }}</p>
       
          <strong><p class="card-text">{{ $order->created_at->diffForHumans()}}</p></strong>
          <p class="card-text">{{ $order->status }}</p>
          <p class="card-text">{{ $order->response }}</p>
          <hr>
        
          
          <h5 class="card-text">{{ $order->price }} ₽</h5>
          <a href="{{route('order.show', $order->id )}}" >Подробнее</a>
        </div>
      </div>

      @endforeach
      {{ $orders->links() }}
    
@endsection
