@foreach ($mainCats as $category)
<ul>
	<li id="{{$category->id}}" data-jstree='{"opened":true
		{{ ($course->categories->contains($category->id)) ? ',"checked":true' : ''  }} }'>
		{{$category->title}}
		@if(count($category->children))
			@include('dashboard.courses.tree.edit',['mainCats' => $category->children])
		@endif
	</li>
</ul>
@endforeach
