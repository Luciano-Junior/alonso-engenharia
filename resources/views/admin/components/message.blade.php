@if(Session::has('success'))
<div class="alert alert-success alert-dismissible" role="alert">
	<strong>Sucesso:</strong>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<p>{{ Session::get('success') }}</p>
</div>
@endif
@if(count($errors) > 0)
<div class="alert alert-danger alert-dismissible" role="alert">
	<strong>Errors:</strong>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<ul>
		@foreach($errors->all() as $erro)
		<li>{{ $erro }}</li>
		@endforeach
	</ul>
	
</div>
@endif