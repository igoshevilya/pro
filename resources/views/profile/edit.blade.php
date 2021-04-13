@extends('templates.default')
@section('content')
   
    
   <div class="container">
   <h3>Редактирование профиля</h3>  
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
					 <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
				</div>
				<h5 class="user-name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h5>
				<h6 class="user-email">yuki@Maxwell.com</h6>
			</div>
			<div class="about">
				<h5>About</h5>
				<p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human experiences.</p>
			</div>
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">



	 <form class="form-horizontal" method="POST" action="{{ route('profile.edit') }}">
      {{ csrf_field() }}
    <div class="card-body">
 <div class="form-group{{ $errors->has('user') ? ' has-error' : '' }}">
 			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Персональные данные</h6>
			</div>
                            

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-8 control-label">Имя</label>

                            <div class="col-md-8">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ Request::old('first_name')?:Auth::user()->first_name }}" required>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-8 control-label">Фамилия</label>

                            <div class="col-md-8">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ Request::old('last_name')?:Auth::user()->last_name }}" required>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                                                 

		<div class="row gutters mt-3">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
                  <button type="submit" class="btn btn-primary">Обновить</button>
					<button type="button" id="submit" name="submit" class="btn btn-secondary">Назад</button>
				
				</div>
			</div>
		</div>
	</div>
     </form>
</div>
</div>
</div>
</div>
   
@endsection