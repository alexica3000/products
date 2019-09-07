@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<h3>Edit Product</h3>
			<form method="post" action="{{ route('product.update', $product->id) }}">
				@csrf
				@method('put')
				<div class="form-group">
					
					<input type="text" class="form-control" id="product" name="product" value="{{ $product->title }}">
					<small id="titleHelp" class="form-text text-muted">Short name of the product</small>

					<textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
					<small id="descriptionHelp" class="form-text text-muted">Short description</small>

					<input type="number" class="form-control" id="price" name="price" placeholder="Enter price" value="{{ $product->price }}">
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

				<button type="submit" class="btn btn-primary">Modify</button>
				@if(isset($cat))
					<input type="hidden" name="cat" value="{{ $cat->id }}">
				@endif
				<a class="btn btn-dark" href="{{ route('product.show', $product->id) }}">Cancel</a>
			</form>
        </div>
    </div>
</div>
@endsection
