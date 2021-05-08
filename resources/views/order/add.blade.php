@extends('templates.default')
@section('content')
    <h3>Добавление задания</h3>

    <form class="form-horizontal" method="POST" action="{{ route('order.store') }}">
        {{ csrf_field() }}
        <div class="row g-2">
        <div class="mb-1 col-md-9">
            <label for="title" class="form-label">Название задания</label>
            <input type="text" name="title" class="form-control" id="title"  value="{{ old('title') }}" placeholder="Короткое название задания" required>
        </div>

        <div class="mb-1 col-md-3">
            <label for="category_id" class="form-label">Вид съёмки</label>
            <select class="form-select" name="category_id" id="country" required="" ">
                <option value="{{ old('category_id') }}">Выберите категорию</option>
                @foreach ($orders as $order)
                 <option value="{{ $order->category['id'] }}">{{ $order->getCategoryOrder() }}</option>
                 @endforeach
            </select>
        </div>

        <div class="mb-1 ">
            <label for="description" class="form-label">Подробное описание задания</label>
            <textarea name="description" class="form-control" id="description" rows="3" value="{{ old('description') }}"
                placeholder="Подробное описание задания" required></textarea>
        </div>


        <div class="mb-1 col-md-4">
            <label for="location" class="form-label">Локация</label>
            <input name="location" type="text" class="form-control" id="location" value="{{ old('location') }}" placeholder="Введите место съёмки" required>
        </div>

        <div class="mb-1 col-md-4">
            <label for="date" class="form-label">Дата съёмки</label>
            <input name="date" type="date" class="form-control" id="date" value="{{ old('date') }}" required>
        </div>

        <div class="mb-1 col-md-4">
            <label for="price" class="form-label">Бюджет</label>
            <input name="price" type="text" class="form-control" id="price" value="{{ old('price') }}" placeholder="Ваш бюджет">
        </div>
    </div>
       

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4 my-3">
                <button type="submit" class="btn btn-primary">
                    Создать задание
                </button>

            </div>
        </div>
    </form>
    @foreach ($orders as $order)



        <div class="card my-1">
            <div class="modal-header">
                <h5 class="modal-title">{{ $order->title }}</h5>
            </div>
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">{{ $order->getCategoryOrder() }}</h6>
                <p class="card-text">{{ $order->description }}</p>
                <p class="card-text">{{ $order->getUserOrder() }}</p>
                <p class="card-text">{{ $order->location }}</p>
                <p class="card-text">{{ $order->price }}</p>
                <p class="card-text">{{ $order->date }}</p>
                <p class="card-text">{{ $order->status }}</p>
                <p class="card-text">{{ $order->response }}</p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    @endforeach


@endsection
