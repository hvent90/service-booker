<div class="container">
	<div class="row expertise-group-homepage-show">
		<h3>{{ $expertiseGroup->name }}</h3>
		<p>{{ $expertiseGroup->description }}</p>
	</div>
</div>
<div class="row expertise-homepage-list">
	@foreach ($expertiseGroup->expertise()->get() as $exp)
		<div id="{{ $exp->id }}" class="expertise-homepage col-sm-12">
			<h4>{{ $exp->title }}</h4>
			<p>{{ $exp->notes }}</p>
		</div>
	@endforeach
</div>