@extends('layouts.app')

@section('content')
	<div class="card">

		<div class="card-header">
			<div class="row">
				<div class="col">
					<h3>Category - {{ $category->title }}</h3>
				</div>
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
							<td>{{ $category->title }}</td>
							@if(Auth::check())
								<td><a href="{{ route('category.show', $category->id) }}">View details</a></td>
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
