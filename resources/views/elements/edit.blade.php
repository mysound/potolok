@extends ('layouts.master')

@section('stylesheets')

	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script>
		tinymce.init({
			selector: 'textarea',
			menubar: false,
			plugins: 'advlist autolink lists link textcolor code',
			toolbar: 'undo redo | formatselect | bold italic backcolor forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | code ',
		});
	</script>

@endsection

@section('content')
	<div class="container">
		<br>
		<a href="/settings">Назад</a>
		<h3>Редактирование элемента</h3>
		<hr>
		<div class="title_line"><h2>{{ $element->block->title }} - {{ $element->title }}</h2></div>
		<form method="POST" action="/settings/elements/{{ $element->id }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			@include('layouts.errors')
			<div class="form-group">
			</div>
			<div class="form-group">
				<label for="title">Заголовок:</label>
				<input type="text" class="form-control" id="title" name="title" value="{{ $element->title }}" required>
			</div>
			<div class="form-group">
				<label for="body">Текст:</label>
				<textarea id="body" name="body" class="form-control">{!! $element->body !!}</textarea>
			</div>
			<div class="form-group">
				<img class="img-circle" src="{{ asset('storage/images/' . $element->image) }}" width="70" height="70">
			</div>
			<div class="form-group">
				<label for="image">Изображение</label>
				<input type="file" name="image" id="image">
			</div>
			<div class="form-group">
				<a href="/settings/{{ $element->block->id }}" class="btn btn-danger">Отменить</a>
				<button type="submit" class="btn btn-primary">Изменить</button>
			</div>
		</form>
	<hr class="separator-line">
	</div>

@endsection