@if ($categoryParent->categoryChildrent->count())
    <ul role="menu" class="sub-menu">
        @foreach ($categoryParent->categoryChildrent as $categoryChild)
            <li>
                <a href="{{route('category.product', ['slug' => $categoryChild->slug, 'id'=>$categoryChild->id])}}">{{ $categoryChild->name }}</a>
                {{-- @include('components.childMenu',['categoryParent' => $categoryChild]) --}}
            </li>
        @endforeach
    </ul>
@endif
