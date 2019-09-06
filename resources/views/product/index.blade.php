@extends('layouts.app')

@section('content')
	<div class="card">

		<div class="card-header">
			<div class="row">
				<div class="col">
					<h3>Products</h3>
				</div>

				@if (Auth::check())
					<div class="col text-right">
						<a class="btn btn-primary" href="{{ route('product.create') }}">New product</a>
					</div>
				@endif
			</div>
		</div>

		<div class="card-body">
			@if(isset($products) and count($products) > 0)
				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Product</th>
							<th scope="col">Description</th>
							<th scope="col">Price</th>
							<th scope="col">Categories</th>
							@if(Auth::check())
								<th scope="col">Actions</th>
							@endif
						</tr>
					</thead>
					<tbody>
						@foreach ($products as $product)
							<tr scope="row">
								<th>{{ $loop->iteration }}</th>
								<td>{{ $product->title }}</td>
								<td>{{ $product->description }}</td>
								<td>{{ $product->price }}</td>
								<td>{{ $product->categories }}</td>
								@if(Auth::check())
									<td><a href="{{ route('product.show', $product->id) }}">View details</a></td>
								@endif
							</tr>
						@endforeach
					</tbody>
				</table>
			@else
				<div>No products.</div>
			@endif
		</div>
	</div>

@endsection
