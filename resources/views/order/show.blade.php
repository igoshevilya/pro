@extends('templates.default')
@section('content')
    <p>{{ $order->title }}</p>
  

    <div class="card my-1">
        <div class="card-header">
          <a  href="{{route('order.show', $order->id )}}" >{{ $order->title }}</a>
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
        

         
          <h5 class="card-text">{{ $order->price }} ₽</h5>
          <form class="form-horizontal" method="POST" action="{{ route('response.store')}}">
              {{ csrf_field() }}
              <div class="row g-2">
              <input type="hidden" value="{{$order->id}}" name="order_id">  
              <div class="mb-1 ">
                     <textarea name="description" class="form-control" id="description" rows="3" 
                      placeholder="Текст отклика" required></textarea>
              </div>
          
          
             
          </div>
             
          
              <div class="form-group">
                  <div class="col-md-6 col-md-offset-4 my-3">
                      <button type="submit" class="btn btn-primary">
                          Откликнуться
                      </button>
          
                  </div>
              </div>
          </form>
        </div>
      </div>
      <h5 class="modal-title">Отклики:</h5>
      @foreach ($responses as $response)   
      <div class="card p-3 my-2">
            <div class="d-flex justify-content-between align-items-center">
                <div class="user d-flex flex-row align-items-center"> 
                  <img src="https://i.imgur.com/hczKIze.jpg" width="30" class="user-img rounded-circle mr-2"> 
                  <span><small class="font-weight-bold text-primary mx-3">{{ $response->getUserResponse() }}</small><br>
                    </span> 
                    </div> <small>2 days ago</small>
            </div>
            <div class="action d-flex justify-content-between mt-2 align-items-center">
                <p>{{ $response->description }}</p>
            </div>
            <div class="action d-flex justify-content-between mt-2 align-items-center">
               <div> <small>Редактировать</small>  <small>Удалить</small> </div>
                
                
            </div>
        </div>
         @endforeach
         {{ $responses->links() }}
    
@endsection
