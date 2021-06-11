<!doctype html>
<html lang="ru">
  <head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <link href="{{ asset('css/vue-image-lightbox.min.css') }}" rel="stylesheet"/>      
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
<!-- CSS only  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
   -->
 <title>@yield('title')</title>
  </head>
 
  <body class="bg-gray-100">
   @include('templates.partials.nav')     
   

    <div id="app">  
     
     @yield('content')
       

   <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
 <!-- JavaScript Bundle with Popper <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
 -->
    </div>
 <script src="{{asset('js/app.js') }}"  > </script>
 <script src="{{asset('js/alpine.min.js')}}"></script>
 <script src="{{ asset('js/vue-image-lightbox.min.js') }}"></script>
</body>
</html>