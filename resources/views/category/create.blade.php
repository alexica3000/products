@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<h1>New Category</h1>
			<form method="post" action="{{ route('category.store') }}">
				@csrf
				<div class="form-group">
					{{-- <label for="exampleInputEmail1">Category</label> --}}
				<input type="text" class="form-control" id="category" name="category" placeholder="Enter category" value="{{ old('category') }}">
					<small id="emailHelp" class="form-text text-muted">Add main category</small>
				</div>
				<button type="submit" class="btn btn-primary">Add</button>
				<a class="btn btn-dark" href="{{ route('home') }}">Cancel</a>
			</form>
        </div>
    </div>
</div>
@endsection
