@extends ('layouts.master')

@section('content')
	<div class="container">
		<br>
		<a href="/settings">Назад</a>
		<h3>{{ $block->title }}</h3>
		<hr>

		@foreach($block->elements as $element)
			<div class="row">
				<div class="col-md-2">
					<img class="img-circle" src="{{ asset('storage/images/' . $element->image) }}" width="120" height="120">
				</div>
				<div class="col-md-8">
					<h4>{{ $element->title }}</h4>
					<p>{!! $element->body !!}</p>
				</div>
				<div class="col-md-1 col-xs-2">
					<a href="/settings/elements/{{ $element->id }}/edit" class="btn btn-info "><span class="glyphicon glyphicon-cog"></span></a>
				</div>
				<div class="col-md-1 col-xs-10">
					<form method="POST" action="/settings/elements/{{ $element->id }}">
						{{ csrf_field() }}			
						{{ method_field('DELETE') }}
						<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
					</form>
				</div>
			</div>
			<hr>
		@endforeach

		<div class="title_line"><h2>Добавить блок</h2></div>
		<form method="POST" action="/settings/{{ $block->id }}/elements" enctype="multipart/form-data">
			{{ csrf_field() }}
			
			@include('layouts.errors')

			<div class="form-group">
				<label for="name">Заголовок:</label>
				<input type="text" class="form-control" id="title" name="title" required>
			</div>

			<div class="form-group">
				<label for="body">Текст:</label>
				<textarea id="body" name="body" class="form-control" required></textarea>
			</div>

			<div class="form-group">
				<label for="image">Изображение</label>
				<input type="file" name="image" id="image">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Добавить</button>
			</div>
		</form>
		<hr>
	</div>
@endsection