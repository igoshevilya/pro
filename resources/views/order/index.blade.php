@extends('templates.default')
@section('content')
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
