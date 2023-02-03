@extends('app')

@section('title', 'Регистрация')

@section('content')

	<form method="POST" action="{{ route('login') }}">
		@csrf
		<label class="form-group d-block">
			<span>Ваше имя:</span>
			<input type="text" name="name" value="{{ old('name') }}" required class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">

			@if($errors->has('name'))
				<p class="invalid-feedback">{{ $errors->first('name') }}</p>
			@endif
		</label>

		<label class="form-group d-block">
			<span>Пароль:</span>
			<input type="password" name="password" required class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">

			@if($errors->has('password'))
				<p class="invalid-feedback">{{ $errors->first('password') }}</p>
			@endif
		</label>

		<label class="form-group d-block">
			<input type="checkbox" name="remember" value="{{ old('remember') ? 'checked' : '' }}">
			<span>Запомнить меня</span>
		</label>

		<button type="submit" class="btn btn-primary">Войти</button>
	</form>
    
@endsection
