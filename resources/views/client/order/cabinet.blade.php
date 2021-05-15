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
        <h5 class="modal-title my-3">Оставте отзыв о работе с {{ $user }}</h5>
        <form class="form-horizontal" method="POST" action="{{ route('cabinet.reviews.store',$ordercabinet->id) }}">
            {{ csrf_field() }}
            
        
            <div class="mb-1">
                        <textarea name="text" class="form-control" id="text" rows="3" value="{{ old('text') }}"
                    placeholder="Напишите отзыв" required></textarea>
            </div>
            <div class="rating_block">
                <input name="rating" value="5" id="rating_5" type="radio" />
                <label for="rating_5" class="label_rating"></label>
               
                <input name="rating" value="4" id="rating_4" type="radio" />
                <label for="rating_4" class="label_rating"></label>
               
                <input name="rating" value="3" id="rating_3" type="radio" />
                <label for="rating_3" class="label_rating"></label>
               
                <input name="rating" value="2" id="rating_2" type="radio" />
                <label for="rating_2" class="label_rating"></label>
               
                <input name="rating" value="1" id="rating_1" type="radio" />
                <label for="rating_1" class="label_rating"></label>
              </div>
        
           
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4 my-3">
                    <button type="submit" class="btn btn-primary">
                        Оставить отзыв
                    </button>
        
                </div>
            </div>
        </form>
        @endif
   </div> </div>
            
      
@endsection
