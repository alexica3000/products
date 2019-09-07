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
						<form action="{{ route('product.destroy', $product->id) }}" method="post">
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
				<div class="col-2">
					<h5><b>Categories:</b></h5>
				</div>
				<div class="col-8">
					<div>
						@foreach ($product->categories as $category)
							<div>{{ $category->title }}</div>
						@endforeach
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-2">
					<h5><b>Description:</b></h5>
				</div>
				<div class="col-8">
					<div>
						{{ $product->description }}
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-2">
					<h5><b>Price:</b></h5>
				</div>
				<div class="col-8">
					<div>
						{{ $product->price }}
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
