@extends('layouts.app')

@section('content')
	<div class="card">

		<div class="card-header">
			<div class="row">
				<div class="col">
					<h1>Categories</h1>
				</div>
					
				@if (Auth::check())
					<div class="col text-right">
						<a class="btn btn-primary" href="{{ route('category.create') }}">New category</a>
					</div>
				@endif
			</div>
		</div>

		<div class="card-body">
			@if(isset($categories) and count($categories) > 0)
				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col" style="width:70%">Category</th>
							@if(Auth::check())
								<th scope="col">Actions</th>
							@endif
						</tr>
					</thead>
					<tbody>
						@foreach ($categories as $category)
							<tr scope="row">
								<th>{{ $loop->iteration }}</th>
								<td><ul>
									@if($category->parent == 0 )
										@include('components.allcat', $category)
									@endif
								</ul></td>
								@if(Auth::check())
									<td><a href="{{ route('category.show', $category->id) }}">View details</a></td>
								@endif
							</tr>
						@endforeach
					</tbody>
				</table>
			@else
				<div>No category.</div>
			@endif
		</div>
	</div>

@endsection
