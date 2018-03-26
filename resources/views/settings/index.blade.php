@extends ('layouts.master')

@section('content')
	<div class="container">
		<h3>Настройки</h3>
	<hr>
	<ul>
		<li><a href="/settings/comments">Отзывы <span class="badge">{{ $comments->count() }}</span></a></li>
		@foreach($blocks as $block)
			<li><a href="/settings/{{ $block->id }}">{{ $block->title }}</a></li>
		@endforeach
	</ul>
	<hr>
	</div>
@endsection