<div class="row">
	<div class="col-md-7 b-carousel">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				@for ($i = 0; $i < $carousel->elements->count(); $i++)
					@if($i == 0)
						<li data-target="#myCarousel" data-slide-to="{{ $i }}" class="active"></li>
					@else
						<li data-target="#myCarousel" data-slide-to="{{ $i }}"></li>
					@endif
				@endfor
			</ol>
			<div class="carousel-inner" role="listbox">

				@foreach($carousel->elements as $element)
					@if($loop->first)
						<div class="item active">
							<img src="{{ asset('img/' . $element->image) }}">
							<div class="container">
								<div class="carousel-caption">
									<h1>{{ $element->title }}</h1>
									<p>{{ $element->body }}</p>
								</div>
							</div>
						</div>
					@else
						<div class="item">
							<img src="{{ asset('img/' . $element->image) }}">
							<div class="container">
								<div class="carousel-caption">
									<h1>{{ $element->title }}</h1>
									<p>{{ $element->body }}</p>
								</div>
							</div>
						</div>
					@endif
				@endforeach
			</div>
		</div>
	</div>
	<div class="col-md-5 b-order text-center" style="background: #fff">
		<h1>Честность и открытость</h1>
		<h2>Цена</h2>
		<h2>Качество</h2>
	</div>
	<div class="col-md-5 b-order text-center" style="background: #9bcf9e">
		<h3 style="color: #fff">Мне важен идеальный результат</h3>
	</div>
	<div class="col-md-5 b-order text-center " style="margin-top: 10px;">
		<h3>Задавайте любые вопросы</h3>
	</div>
</div>