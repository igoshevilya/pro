@extends('templates.default')
@section('content')


<h5 class="modal-title my-3">Оставте отзыв о работе с {{ $user }}</h5>
<form class="form-horizontal" method="POST" action="{{ route('reviews.store') }}">
    {{ csrf_field() }}
    

    <div class="mb-1">
                <textarea name="text" class="form-control" id="text" rows="3" value="{{ old('text') }}"
            placeholder="Напишите отзыв" required></textarea>
    </div>
    <div class="rating_block">
       <input name="rating" value="1" id="rating_1" type="radio" />
        <label for="rating_1" class="label_rating"></label> 
       
        <input name="rating" value="2" id="rating_2" type="radio" />
        <label for="rating_2" class="label_rating"></label>

        <input name="rating" value="3" id="rating_3" type="radio" />
        <label for="rating_3" class="label_rating"></label>
            
         <input name="rating" value="4" id="rating_4" type="radio" />
        <label for="rating_4" class="label_rating"></label>
        
        <input name="rating" value="5" id="rating_5" type="radio" />
        <label for="rating_5" class="label_rating"></label>
      </div>

   
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4 my-3">
            <button type="submit" class="btn btn-primary">
                Оставить отзыв
            </button>

        </div>
    </div>
</form>
      
@endsection
