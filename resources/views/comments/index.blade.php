@extends ('layouts.master')

@section('content')

	<div class="container">
		<div class="title_line"><h2>Отзывы о Частном Мастере:</h2></div>
		<a href="/comments/create">Оставить отзыв</a>
		<hr>
		@foreach($comments as $comment)
			<h4>{{ $comment->name }}</h4>
			<p>{{ $comment->body }}</p>
			<hr>
		@endforeach
		<a href="/comments/create">Оставить отзыв</a>
		<hr>
	</div>

@endsection
