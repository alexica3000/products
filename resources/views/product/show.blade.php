@extends('layouts.app')

@section('content')
	<div class="card">

		<div class="card-header">
			<div class="row">
				<div class="col">
					<h3>Details about <b>{{ $product->title }}</b></h3>
				</div>

				@if (Auth::check())
					<div class="col text-right">
						<form action="{{ route('category.destroy', $product->id) }}" method="post">
							@method('delete')
							@csrf
							<a class="btn btn-info" href="{{ route('product.edit', $product->id) }}">Modify</a>
							<button class="btn btn-danger" type="submit">Delete</button>
						</form>
					</div>
				@endif
			</div>
		</div>

		<div class="card-body">
			<div class="row">
				<div class="col">
					<h5>Categories:</h5>
				</div>
			</div>
		</div>
	</div>

@endsection
