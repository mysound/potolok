@extends ('layouts.master')

@section('content')
	<div class="container">
		<hr>
		<form method="POST" action="/settings/comments/{{ $comment->id }}">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<input type="hidden" name="id" value="{{ $comment->id }}">
			@include('layouts.errors')
			<div class="form-group">
				<label for="name">Автор: {{ $comment->name }}</label>
			</div>
			<div class="form-group">
				<label for="body">Текст отзыва:</label>
				<textarea id="body" name="body" class="form-control" required>{{ $comment->body }}</textarea>
			</div>
	
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Изменить отзыв</button>
			</div>
		</form>
		<hr>
	</div>
@endsection