@extends ('layouts.master')

@section('description', 'Устанавливаю натяжные потолки и освещение в Армавир и в близлежащих городах по выгодным ценам. Бесплатный выезд на замер. Огромный выбор!')
@section('keywords', 'натяжные потолки, освещение, установка, недорого, цена, Армавир')

@section('content')

	<div class="container b-carousel__line">
		@include('layouts.carousel')
	</div>

	<div class="container">
		<div class="title_line" style="margin-top:20px"><span class="h2">Потолки от Частного Мастера это:</span></div>

		@include('layouts.firstblock')

		<hr class="separator-line">

		<div class="title_line"><span class="h2">Вы получаете</span></div>
		
		@include('layouts.secondblock')

		

		<div class="title_line"><h2>Отзывы моих клиентов</h2></div>
		<div class="row">
			@foreach($comments as $comment)
				<div class="col-md-4">
					<div class="thumbnail">
						<div class="caption alert-info text-center">
							<h4>{{ $comment->name }}</h4>
						</div>
						<div>
							<p>{{ $comment->body }}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<div>
			<ol class="breadcrumb">
				<li><a href="/comments">Все отзывы</a></li>
				<li><a href="/comments/create">Оставить отзыв</a></li>
			</ol>
		</div>
		<hr class="separator-line">

	</div>

@endsection