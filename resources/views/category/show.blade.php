@extends('layouts.app')

@section('content')
	<div class="card">

		<div class="card-header">
			<div class="row">
				<div class="col">
					<h3>Category - {{ $category->title }}</h3>
				</div>

				@if (Auth::check())
					<div class="col text-right">
						<form action="{{ route('category.destroy', $category->id) }}" method="post">
							@method('delete')
							@csrf
							<button class="btn btn-danger" type="submit">Delete</button>
						</form>
					</div>
				@endif
			</div>
		</div>

		<div class="card-body">
			<div class="text-right">
				<form action="{{ route('category.create', $category->id) }}" method="get">
					@csrf
					<button class="btn btn-primary">Add subcategory</button>
					{{-- <input type="hidden" name="prim_category" value="{{ $category->id }}"> --}}
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
