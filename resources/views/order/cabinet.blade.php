@extends('templates.default')
@section('content')


<div class="card my-1">
    <div class="card-header">
     
        <h5 class="modal-title">{{ $ordercabinet->id }}</h5>
        <h5 class="modal-title">Название задания: {{ $ordercabinet->order->title }}</h5>
        <h5 class="modal-title">Дата съёмки: {{ $ordercabinet->order->date }}</h5>
        <h5 class="modal-title">Фотограф: {{ $user }}</h5>
        <h5 class="modal-title">Клиент: {{ $client }}</h5>
        @if ($ordercabinet->status == 1)
        <a class="btn btn-primary my-3" href="{{route('order.done',  $ordercabinet->id)}}" role="button">Подтвердить выполнение</a>
        @endif
        @if ($ordercabinet->status == 2)
        <a class="btn btn-primary my-3" href="{{route('order.done',  $ordercabinet->id)}}" role="button">Оставить отзыв</a>
        @endif
   </div> </div>
            
      
@endsection
