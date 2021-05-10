<header class="p-3 mb-3 border-bottom">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
     <img width="46" src="{{ asset('camera.svg') }}" alt="логотип">
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/order" class="nav-link px-2 link-secondary">Задания</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Inventory</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Customers</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Products</a></li>
        <li><p class="">@auth Пользователь: {{ Auth::user()->first_name }} {{Auth::user()->last_name}}@endauth</p></li>
      </ul>

      <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
        <input type="search" class="form-control" placeholder="Search...">
      </form>
                    @guest
                    <a href="{{ route('register') }}">Зарегистрироваться</a>
                    <a class="btn btn-primary" href="{{route('login')}}">Войти</a>
                    @endguest
          
                    
      @auth
      <div class="dropdown text-end">
        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
        </a>
        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
          <li><a class="dropdown-item" href="{{route('profile.index',['user'=>Auth::user()->user])}}">Профиль</a></li>
          <li><a class="dropdown-item" href="#">Settings</a></li>
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="{{route('get-logout')}}">Выйти</a></li>
        </ul>
      </div>
      @endauth
    </div>
  </div>
</header>