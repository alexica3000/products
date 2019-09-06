@extends('layouts.app')

@section('content')
	<div class="card">

		<div class="card-header">
			<div class="row">
				<div class="col">
					<h3>Category - <b>{{ $category->title }}</b></h3>
				</div>

				@if (Auth::check())
					<div class="col text-right">
						<form action="{{ route('category.destroy', $category->id) }}" method="post">
							@method('delete')
							@csrf
							<a class="btn btn-info" href="{{ route('category.edit', $category->id) }}">Modify</a>
							<button class="btn btn-danger" type="submit">Delete</button>
						</form>
					</div>
				@endif
			</div>
		</div>

		<div class="card-body">
			<div class="text-right pb-3">
				<form action="{{ route('category.create', $category->id) }}" method="get">
					<button class="btn btn-primary">Add subcategory</button>
					<input type="hidden" name="cat" value="{{ $category->id }}">
				</form>
			</div>

			@if(isset($subcategories) and count($subcategories) > 0)
			<table class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col" style="width:70%">Subcategory</th>
						@if(Auth::check())
							<th scope="col">Actions</th>
						@endif
					</tr>
				</thead>
				<tbody>
					@foreach ($subcategories as $subcategory)
						<tr scope="row">
							<th>{{ $loop->iteration }}</th>
							<td>{{ $subcategory->title }}</td>
							@if(Auth::check())
								<td><a href="{{ route('category.show', $subcategory->id) }}">View details</a></td>
							@endif
						</tr>
					@endforeach
				</tbody>
				</table>
			@else
				<div>There are no subcategories.</div>
			@endif
		</div>
	</div>

@endsection
