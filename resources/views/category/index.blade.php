@extends('templates.default')
@section('content')
    <p>This is my body content3.</p>
       @foreach ($categories as $category)
        {{ $category->title }}
    @endforeach
@endsection