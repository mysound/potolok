@extends ('layouts.master')

@section('content')
	<div class="container">
		<br>
		<a href="/settings">Назад</a>
		<h3>Все отзывы</h3>
		<hr>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Дата</th>
					<th>Автор</th>
					<th>Текст сообщения</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($comments as $comment)
					<tr class="{{ $comment->confirmed ? '' : 'warning' }}">
						<td>{{ $comment->id }}</td>
						<td>{{ $comment->created_at }}</td>
						<td>{{ $comment->name }}</td>
						<td><a href="/settings/comments/{{ $comment->id }}/edit">{{ str_limit($comment->body, 100) }}</a></td>
						<td>
							<form method="POST" action="/settings/comments/{{ $comment->id }}">
								{{ csrf_field() }}			
								{{ method_field('PATCH') }}
								<input type="hidden" name="id" value="{{ $comment->id }}">
								@if(!$comment->confirmed)
									<button type="submit" class="btn btn-primary btn-sm">Разместить</button>
								@else
									<button type="submit" class="btn btn-sm">Не показывать</button>
								@endif
							</form>
						</td>
						<td>
							<form method="POST" action="/settings/comments/{{ $comment->id }}">
								{{ csrf_field() }}			
								{{ method_field('DELETE') }}
								<input type="hidden" name="id" value="{{ $comment->id }}">
								<button type="submit" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

		<hr>
	</div>
@endsection