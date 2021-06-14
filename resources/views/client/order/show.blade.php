@extends('templates.default')
@section('content')


<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class=" px-4 my-1 sm:px-6 lg:px-8 py-4 bg-white shadow sm:rounded-md">
        <div class="max-w-7xl mx-auto">
            <a href="{{back()->getTargetUrl()}}">
            <div class="inline-block mr-2 mt-2">
                <button type="button"
                    class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">Назад</button>
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
                            {{ $order->description }}                            
                        </dd>

                    </div>

                </dl>
            </div>
            
        


        </div>
        @if(!empty($order->responses))
        <p class="mt-2 text-2xl leading-8 font-bold tracking-tight text-gray-900">Предложения:</p>
    @else

    <p class="mt-2 text-xl leading-8 font-bold tracking-tight text-gray-900">Предложения отсуствуют</p>

    @endif
        

        @foreach ($responses as $response)
        <div class="px-4 my-4 sm:p-6 border sm:rounded-lg bg-white">
            <div class="sm:col-span-1">
                
                <a href="{{ route('profile.index',$response->user->user) }}" class="flex-shrink-0 group block">
                    <div class="flex items-center">
                      @if ($response->user->avatar)
                      <img class="h-9 w-9 rounded-full"
                          src="{{ asset('/') . $response->user->avatar->thumbnail }}" alt="">
                  @else
  
                      <svg class="h-9 w-9 text-indigo-700" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px"
                          y="0px" viewBox="0 0 45.532 45.532" xml:space="preserve">
                          <path xmlns="http://www.w3.org/2000/svg" fill="#4f46e5" id="svg_2"
                              d="m22.766,0.001c-12.572,0 -22.766,10.192 -22.766,22.765s10.193,22.765 22.766,22.765c12.574,0 22.766,-10.192 22.766,-22.765s-10.192,-22.765 -22.766,-22.765zm0,6.807c4.16,0 7.531,3.372 7.531,7.53c0,4.159 -3.371,7.53 -7.531,7.53c-4.158,0 -7.529,-3.371 -7.529,-7.53c0,-4.158 3.371,-7.53 7.529,-7.53zm-0.005,32.771c-4.149,0 -7.949,-1.511 -10.88,-4.012c-0.714,-0.609 -1.126,-1.502 -1.126,-2.439c0,-4.217 3.413,-7.592 7.631,-7.592l8.762,0c4.219,0 7.619,3.375 7.619,7.592c0,0.938 -0.41,1.829 -1.125,2.438c-2.93,2.502 -6.731,4.013 -10.881,4.013z" />
                      </svg>
  
                  @endif
                      <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">
                          {{$response->user->getName()}}
                        </p>
                        
                      </div>
                    </div>
                  </a>
                
            </div>
            <div class="mt-2  text-sm text-gray-700">
                <p>
                    {{ $response->description }}
                </p>
            </div>
            <div class="mt-2 max-w-xl text-sm text-gray-500">
                <p>
                    {{ $response->created_at->diffForHumans() }}
                </p>
            </div>
            @if($order->status == null)
            <div class="mt-5">
                <a href="{{ route('order.assigned', ['orderId' => $order->id, 'responseId' => $response->id]) }}">
                    <button type="button"
                        class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                        Принять предложение
                    </button></a>
            </div>
            @endif
        </div>
    
    @endforeach
    {{ $responses->links() }}


        

    </div>
</div>












 


@endsection
