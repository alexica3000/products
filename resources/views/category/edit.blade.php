@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<h3>Edit Category</h3>
			<form method="post" action="{{ route('category.update', $category->id) }}">
				@csrf
				@method('put')
				<div class="form-group">
					{{-- <label for="exampleInputEmail1">Category</label> --}}
					<input type="text" class="form-control" id="category" name="category" placeholder="Enter category" value="{{ $category->title }}">
					<small id="emailHelp" class="form-text text-muted">Short name of the category</small>
				</div>
				<button type="submit" class="btn btn-primary">Modify</button>
				@if(isset($cat))
					<input type="hidden" name="cat" value="{{ $cat->id }}">
				@endif
				<a class="btn btn-dark" href="{{ url()->previous() }}">Cancel</a>
			</form>
        </div>
    </div>
</div>
@endsection
