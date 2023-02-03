@extends('app')

@section('title', 'Регистрация')

@section('content')

	<form method="POST" action="{{ route('register') }}">
		@csrf
		<label class="form-group d-block">
			<span>Ваше имя:</span>
			<input type="text" name="name" value="{{ old('name') }}" required class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">

			@if($errors->has('name'))
				<p class="invalid-feedback">{{ $errors->first('name') }}</p>
			@endif
		</label>

		<label class="form-group d-block">
			<span>Ваш email:</span>
			<input type="text" name="email" value="{{ old('email') }}" required class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
			@if($errors->has('email'))
				<p class="invalid-feedback">{{ $errors->first('email') }}</p>
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
			<span>Повторите пароль:</span>
			<input type="password" name="password_confirmation" required class="form-control">
		</label>

		<button type="submit" class="btn btn-primary">Создать аккаунт</button>
	</form>
    
@endsection
