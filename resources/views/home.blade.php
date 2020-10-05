<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
{{--    <link rel="icon" href="<%= BASE_URL %>favicon.ico">--}}
    <title>Products App</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
</head>
<body>
<noscript>
    <strong>We're sorry but <%= htmlWebpackPlugin.options.title %> doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
</noscript>
<div id="app"></div>
</body>
</html>



{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--	<div class="card">--}}

{{--		<div class="card-header">--}}
{{--			<div class="row">--}}
{{--				<div class="col">--}}
{{--					<h1>Categories</h1>--}}
{{--				</div>--}}
{{--					--}}
{{--				@if (Auth::check())--}}
{{--					<div class="col text-right">--}}
{{--						<a class="btn btn-primary" href="{{ route('category.create') }}">New category</a>--}}
{{--					</div>--}}
{{--				@endif--}}
{{--			</div>--}}
{{--		</div>--}}

{{--		<div class="card-body">--}}
{{--			@if(isset($categories) and count($categories) > 0)--}}
{{--				<table class="table">--}}
{{--					<thead>--}}
{{--						<tr>--}}
{{--							<th scope="col">#</th>--}}
{{--							<th scope="col" style="width:70%">Category</th>--}}
{{--							@if(Auth::check())--}}
{{--								<th scope="col">Actions</th>--}}
{{--							@endif--}}
{{--						</tr>--}}
{{--					</thead>--}}
{{--					<tbody>--}}
{{--						@foreach ($categories as $category)--}}
{{--							<tr scope="row">--}}
{{--								<th>{{ $loop->iteration }}</th>--}}
{{--								<td>{{ $category->title }}</td>--}}
{{--								@if(Auth::check())--}}
{{--									<td><a href="{{ route('category.show', $category->id) }}">View details</a></td>--}}
{{--								@endif--}}
{{--							</tr>--}}
{{--						@endforeach--}}
{{--					</tbody>--}}
{{--				</table>--}}
{{--			@else--}}
{{--				<div>No category.</div>--}}
{{--			@endif--}}
{{--		</div>--}}
{{--	</div>--}}

{{--@endsection--}}
