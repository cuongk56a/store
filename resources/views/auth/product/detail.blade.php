@extends('layouts.master')

@section('title')
    <title>E-Shopper</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                @include('components.sidebar')
                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="{{ $product->feature_image_path }}" alt="{{ $product->name }}" />
                                <h3>ZOOM</h3>
                            </div>
                            {{-- <div id="similar-product" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($product->images as $key => $imageItem)
                                            <a href="{{ $imageItem->image_path }}"  target="_blank">
                                                <img src="{{ $imageItem->image_path }}" alt="">
                                            </a>
                                    @endforeach
                                </div>
                            </div> --}}
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="{{asset('eshopper/images/product-details/new.jpg')}}" class="newarrival" alt="{{ $product->name }}" />
                                <h2>{{ $product->name }}</h2>
                                <p>Web ID: 1089772</p>
                                <img src="{{asset('eshopper/images/product-details/rating.png')}}" alt="{{ $product->name }}" />
                                <span>
                                    <span>{{ number_format($product->price) }}</span>
                                    <label>Quantity:</label>
                                    <input type="text" class="input_quantity" value="1" />
                                    <button type="button" class="btn btn-fefault cart add_cart" data-url="{{route('cart.add', ['id'=>$product->id])}}">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                </span>
                                <p><b>Loại:</b> {{ $product->category->name }}</p>
                                <p><b>Brand:</b> E-SHOPPER</p>
                                <a href=""><img src="{{asset('eshopper/images/product-details/share.png')}}" class="share img-responsive"
                                    alt="" />
                                </a>
                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->
                    <div class="category-tab shop-details-tab"><!--category-tab-->
                        <div class="tab-content">
                            <div class="tab-pane fade active in">
                                {{-- <div class="col-sm-12">
                                    {{!! $product->content !!}}
                                </div> --}}
                            </div>

                        </div>
                    </div><!--/category-tab-->

                    <div class="recommended_items">
                        <h2 class="title text-center">recommended items</h2>
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($productRecommed as $keyRecommed => $productRecommedItem)
                                    @if ($keyRecommed % 3 == 0)
                                        <div class="item {{ $keyRecommed == 0 ? 'active' : '' }}">
                                    @endif
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{ $productRecommedItem->feature_image_path }}"
                                                        alt="{{ $productRecommedItem->name }}" />
                                                    <h2>{{ number_format($productRecommedItem->price) }} VNĐ</h2>
                                                    <p>{{ $productRecommedItem->name }}</p>
                                                    <a href="#" 
                                                        class="btn btn-default add-to-cart add_to_cart"
                                                        data-url="{{route('cart.add', ['id'=>$productRecommedItem->id])}}"
                                                    >
                                                        <i class="fa fa-shopping-cart">
                                                        </i>
                                                        Add to cart
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="choose">
                                                <ul class="nav nav-pills nav-justified">
                                                    <li>
                                                        <a href="{{route('products.show',['id'=>$productRecommedItem->id])}}">
                                                            <i class="fa fa-info-circle"></i>
                                                            Chi tiết sản phẩm
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($keyRecommed % 3 == 2)
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{asset('home/home.js')}}"></script>
@endsection