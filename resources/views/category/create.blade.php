@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			@if(isset($cat))
				<h3>New Subcategory for <b>{{ $cat->title }}</b></h3>
			@else
				<h3>New Category</h3>
			@endif
			
			<form method="post" action="{{ route('category.store') }}">
				@csrf
				<div class="form-group">
					{{-- <label for="exampleInputEmail1">Category</label> --}}
					<input type="text" class="form-control" id="category" name="category" placeholder="Enter category" value="{{ old('category') }}">
					<small id="emailHelp" class="form-text text-muted">Short name of the category</small>
				</div>
				<button type="submit" class="btn btn-primary">Add</button>
				@if(isset($cat))
					<input type="hidden" name="cat" value="{{ $cat->id }}">
				@endif
				<a class="btn btn-dark" href="{{ route('home') }}">Cancel</a>
			</form>
        </div>
    </div>
</div>
@endsection
