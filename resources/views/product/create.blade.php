@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<h3>New Product</h3>
			
			<form method="post" action="{{ route('product.store') }}">
				@csrf
				<div class="form-group">
					{{-- <label for="exampleInputEmail1">Name of product</label> --}}
					<input type="text" class="form-control" id="product" name="product" placeholder="Enter product" value="{{ old('product') }}">
					<small id="nameHelp" class="form-text text-muted">Short name of the product</small>

					{{-- <label for="description">Description</label> --}}
					<textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description">{{ old('description') }}</textarea>
					<small id="descriptionHelp" class="form-text text-muted">Short description</small>

					<input type="number" class="form-control" id="price" name="price" placeholder="Enter price" value="{{ old('price') }}">
					<small id="priceHelp" class="form-text text-muted">Price of the product</small>

				</div>

				<h4>Select categories:</h4>
				<div>
					<ul>
						@foreach ($categories as $category)
							@if($category->parent == 0 )
								@include('components.category', $category)
							@endif
						@endforeach
					</ul>
				</div>
				<button type="submit" class="btn btn-primary">Add</button>
				<a class="btn btn-dark" href="{{ url()->previous() }}">Cancel</a>
			</form>
        </div>
    </div>
</div>
@endsection
