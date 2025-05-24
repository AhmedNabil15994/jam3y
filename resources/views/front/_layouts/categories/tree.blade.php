{{-- main Categories / First Loop --}}
@foreach ($homeCategories as $mainCategory)

    <li class="{{ (count($mainCategory->courses) > 0) ? '' : ' has-children' }}">

        <a href="{{ (count($mainCategory->courses) > 0) ? url(route('front.categories.show',$mainCategory->slug)) : 'javascript:;' }}">
            <span>{{$mainCategory->title}}</span>

            @if(count($mainCategory->activeChildren) > 0)
                <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
            @endif

        </a>

        {{-- if This Category has sub --}}
        @if(count($mainCategory->activeChildren) > 0)

            <ul class="sub-category is-hidden">
                {{-- It will loop  in first loop but with the new object of sub and it will take the same name mainCategories --}}
                @include('front._layouts.categories.tree',['homeCategories' => $mainCategory->activeChildren])
            </ul>

        @endif
    </li>

@endforeach
