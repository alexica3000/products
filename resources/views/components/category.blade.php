<li>
	<div class="form-check">
		<input class="form-check-input" type="checkbox" value="{{ $category->id }}" id="category" name="category[]"
			@isset($product)
				@foreach ($product->categories as $product_category)
					@if ($category->id == $product_category->id)
						checked
					@endif
				@endforeach
			@endisset
		>
		<label class="form-check-label" for="defaultCheck1">
			{{ $category->title }}
		</label>
	</div>
	@if ($category->children()->count() > 0 )
		<ul>
			@foreach($category->children as $category)
				@include('components.category', $category)
			@endforeach
		</ul>
	@endif
</li>