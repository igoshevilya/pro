@extends('templates.default')
@section('content')
<div class="max-w-7xl mx-auto my-4 sm:px-6 lg:px-8">
<p class="mt-2 mb-6 text-3xl leading-8 font-bold tracking-tight text-gray-900 sm:text-4xl">
    Создание задания
  </p>
  <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">


    <form class="form-horizontal" method="POST" action="{{ route('order.store') }}">
        {{ csrf_field() }}

        <div class="">
        <div class="mb-1 col-md-9">
            <label for="title" class="block text-sm font-medium text-gray-700">Название задания</label>
            <input type="text" name="title" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" id="title"  value="{{ old('title') }}" placeholder="Короткое название задания" required>
        </div>

        <div class="mb-1 col-md-3">
            <label for="category_id" class="block text-sm font-medium text-gray-700">Вид съёмки</label>
            <select class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" name="category_id" id="country" required="">
                <option value="{{ old('category_id') }}">Выберите категорию</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-1 ">
            <label for="description" class="block text-sm font-medium text-gray-700">Подробное описание задания</label>
            <textarea name="description" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" id="description"  value="{{ old('description') }}"
                placeholder="Подробное описание задания" required></textarea>
        </div>


        <div class="mb-1 col-md-4">
            <label for="location" class="block text-sm font-medium text-gray-700">Локация</label>
            <input name="location" type="text" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" id="location" value="{{ old('location') }}" placeholder="Введите место съёмки" required>
        </div>

        <div class="mb-1 col-md-4">
            <label for="date" class="block text-sm font-medium text-gray-700">Дата съёмки</label>
            <input name="date" type="date" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" id="date" value="{{ old('date') }}" required>
        </div>

        <div class="mb-1 col-md-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Бюджет</label>
            <input name="price" type="text" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" id="price" value="{{ old('price') }}" placeholder="Ваш бюджет">
        </div>
    </div>
       

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4 my-3">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Создать задание
                  </button>
            </div>
        </div>
    </form>
   
  </div>
</div>

@endsection
