@extends('templates.default')
@section('content')
    <p>This is my body content2.</p>



    
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
       
          <p class="card-text">{{ $order->date }}</p>
          <p class="card-text">{{ $order->status }}</p>
          <p class="card-text">{{ $order->response }}</p>
          <hr>
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
          <h5 class="card-text">{{ $order->price }} ₽</h5>
        </div>
      </div>
      @endforeach
      
    
@endsection
