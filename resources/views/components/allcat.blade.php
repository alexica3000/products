<li>
	<a href="{{ route('category.show', $category->id) }}">{{ $category->title }}</a>
	@if ($category->products()->count())
		(<a href="{{ route('cat.product', $category->id) }}">{{ $category->products()->count() }} products</a>)
	@endif

	@if ($category->children()->count() > 0 )
		<ul>
			@foreach($category->children as $category)
				@include('components.allcat', $category)
			@endforeach
		</ul>
	@endif
</li>