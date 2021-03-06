@extends ('layouts.master')

@section('title', ' - оставить отзыв')
@section('description', 'Установка натяжных потолков в Армавир, Мостовской, Курганинск по выгодным ценам от Частного Мастера. Оставить отзыв')
@section('keywords', 'натяжные потолки, освещение, установка, Армавир, Новокубанск, Псебай, оставить отзыв')

@section('content')
	<div class="container">
		<div class="title_line"><h2>Оставьте свой отзыв о Частном Мастере:</h2></div>
		<p><a href="/comments">Все отзывы</a></p>
		<form method="POST" action="/comments">
			{{ csrf_field() }}
			@include('layouts.errors')
			<div class="form-group">
				<label for="name">Ваше Имя:</label>
				<input type="text" class="form-control" id="name" name="name" required>
			</div>
			<div class="form-group">
				<label for="body">Текст отзыва:</label>
				<textarea id="body" name="body" class="form-control" required></textarea>
			</div>

			<div class="form-group">
				{!! NoCaptcha::display() !!}
			</div>			
			
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Оставить отзыв</button>
			</div>
		</form>
	<hr class="separator-line">
	</div>

@endsection