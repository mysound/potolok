@extends ('layouts.master')
@section ('content')
	<div class="container">
		<h3>Login page</h3>
		<form method="POST" action="/login">

			{{ csrf_field() }}
			
			@include('layouts.errors')
			
			<div class="form-group">
				<label for="email">E-Mail:</label>
				<input type="email" class="form-control" id="email" name="email" required>
			</div>
			<div class="form-group">
				<label for="password">Пароль</label>
				<input type="password" class="form-control" id="password" name="password" required>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Войти</button>
			</div>
			
		</form>
	</div>
@endsection