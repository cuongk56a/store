<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Danh mục sản phẩm</h2>
        <div class="panel-group category-products"><!--category-productsr-->
            @foreach ($categorys as $categoryItem)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            @if($categoryItem->categoryChildrent->count()) 
                            <a data-toggle="collapse" data-parent="#accordian" href="#{{$categoryItem->id}}">
                                <span class="badge pull-right">
                                    <i class="fa fa-plus"></i>
                                </span>
                                {{ $categoryItem->name }}
                            </a>
                            @else 
                            <a href="{{route('category.product', ['slug' => $categoryItem->slug, 'id'=>$categoryItem->id])}}">
                                <span class="badge pull-right"></span>
                                {{ $categoryItem->name }}
                            </a>
                            @endif
                        </h4>
                    </div>   
                </div>
                <div id="{{$categoryItem->id}}" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            @foreach ($categoryItem->categoryChildrent as $categoryChildrent)
                                <li>
                                    <a href="{{route('category.product', ['slug' => $categoryChildrent->slug, 'id'=>$categoryChildrent->id])}}">
                                        {{$categoryChildrent->name}}
                                    </a>
                                </li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
            @endforeach
        </div><!--/category-products-->
    </div>
</div>
