<header>
	<div class="container b-header">
		<div class="row">
			<div class="col-md-3 b-header__logo">
				<a href="/"><img class="img-circle" src="/img/logo.jpg" width="140" height="140"></a>
			</div>
			<div class="col-md-8 b-header__title">
				<h1>Натяжные Потолки</h1>
				<div class="b-header-title-second"><span class="h3">от Частного Мастера</span></div>
				<div class="b-header-title-phone"><span class="h3">8-928-42-90-190</span></div><span>г.Армавир</span>
			</div>
			<div class="col-md-1 b-header__title">
				@if(Auth::check())
					<a href="#" class="dropdown-toggle username" data-toggle="dropdown" id="drop1">{{ Auth::user()->name }}<span class="caret"></span></a>
					<ul class="dropdown-menu" aria-labelledby="drop1">
						<li><a href="/settings">Настройки</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="/logout">Выход</a></li>
					</ul>
				@else
					<a href="/login">Вход</a>
				@endif
			</div>
		</div>
	</div>
</header>