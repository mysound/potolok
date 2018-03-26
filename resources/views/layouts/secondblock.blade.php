@foreach($secondblock->elements as $element)
<div class="row">
	<div class="lead col-md-7 {{ is_int($loop->iteration/2) ? 'col-md-push-5' : ' '}}">
		<h2>{{ $element->title }}</h2>
		<p>{!! $element->body !!}</p>
	</div>
	<div class="col-md-5 {{ is_int($loop->iteration/2) ? 'col-md-pull-7	' : ' '}}">
		<img class="img-responsive center-block" src="{{ asset('img/' . $element->image) }}" width="500">
	</div>
</div>

<hr class="separator-line">
@endforeach