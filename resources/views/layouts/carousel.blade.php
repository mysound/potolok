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
							<img src="{{ asset('storage/images/' . $element->image) }}">
							<div class="container">
								<div class="carousel-caption">
									<span class="h2">{{ $element->title }}</span>
									<p>{!! $element->body !!}</p>
								</div>
							</div>
						</div>
					@else
						<div class="item">
							<img src="{{ asset('storage/images/' . $element->image) }}">
							<div class="container">
								<div class="carousel-caption">
									<span class="h2">{{ $element->title }}</span>
									<p>{{ $element->body }}</p>
								</div>
							</div>
						</div>
					@endif
				@endforeach
			</div>
		</div>
	</div>
	<a href="https://www.instagram.com/samrat_potolok/"><div class="col-md-5 text-center">
		<h3>Мои работы в Instagram <img class="img-circle" src="/img/instagram.png" width="40" height="40"></h3>
	</div></a>
	<div class="col-md-5 b-order text-center" style="background: #fff;">
		<span class="h1">Честность и открытость</span>
		<h3>Мне важен идеальный результат</h3>
	</div>
	<div class="col-md-5 b-order text-center" style="background: #9bcf9e">
		<h3 style="color: #fff">Задавайте любые вопросы</h3>
	</div>
	<div class="col-md-5 b-order text-center">
		<h3>Цена напрямую зависит от объема работ и используемых материалов</h3>
	</div>
</div>