@extends('layouts.master')

@section('title')
    <title>E-Shopper</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection

@section('content')
    @include('auth.components.slider')
    <section>
        <div class="container">
            <div class="row">
                @include('components.sidebar')
                <div class="col-sm-9 padding-right">
                    <!--features_items-->
                    <div class="features_items">
                        <h2 class="title text-center">Sản Phẩm Mới</h2>
                        @foreach ($productFeature as $productFeatureItem)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ $productFeatureItem->feature_image_path }}"
                                                alt="{{ $productFeatureItem->feature_image_name }}" />
                                            <h2>{{ number_format($productFeatureItem->price) }} VNĐ</h2>
                                            <p>{{ $productFeatureItem->name }}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>{{ number_format($productFeatureItem->price) }}</h2>
                                                <p>{{ $productFeatureItem->name }} VNĐ</p>
                                                <a  href="#" 
                                                    class="btn btn-default add-to-cart add_to_cart"
                                                    data-url="{{route('cart.add', ['id'=>$productFeatureItem->id])}}"
                                                >
                                                        <i class="fa fa-shopping-cart"></i>
                                                        Add to cart
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li>
                                                <a href="{{route('products.show',['id'=>$productFeatureItem->id])}}" target="_blank">
                                                    <i class="fa fa-info-circle"></i>
                                                    Chi tiết sản phẩm
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--features_items-->

                    {{-- <!--category-tab-->
                    <div class="category-tab">
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                @foreach ($categorys as $key=>$categoryItem)
                                    <li class="{{$key == 0 ? 'active' : ''}}">
                                        <a href="#{{$categoryItem->id}}" data-toggle="tab">
                                            {{$categoryItem->name}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-content">
                            @foreach ($categorys as $keyProduct=>$categoryProductItem)
                            <div class="tab-pane fade {{$keyProduct == 0 ? 'active in' : ''}}" id="{{$categoryProductItem->id}}">
                                @foreach ($categoryProductItem->categoryProduct as $productItem)
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{$productItem->feature_image_path}}"
                                                    alt="{{ $productItem->name }}" />
                                                <h2>{{ number_format($productItem->price) }} VNĐ</h2>
                                                <p>{{ $productItem->name }}</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!--/category-tab--> --}}

                    <!--recommended_items-->
                    <div class="recommended_items">
                        <h2 class="title text-center">Đề Xuất</h2>
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
                                                    alt="{{ $productRecommedItem->name}}" />
                                                    <h2>{{ number_format($productRecommedItem->price) }} VNĐ</h2>
                                                    <p>{{ $productRecommedItem->name }}</p>
                                                    <a href="#" 
                                                        class="btn btn-default add-to-cart add_to_cart"
                                                        data-url="{{route('cart.add', ['id'=>$productRecommedItem->id])}}"
                                                    >
                                                        <i class="fa fa-shopping-cart"></i>
                                                        Add to cart
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="choose">
                                                <ul class="nav nav-pills nav-justified">
                                                    <li>
                                                        <a href="{{route('products.show',['id'=>$productRecommedItem->id])}}" target="_blank">
                                                            <i class="fa fa-info-circle"></i>
                                                            Chi tiết sản phẩm
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @if ( $keyRecommed % 3 == 2)
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
                <!--/recommended_items-->
            </div>
        </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{asset('home/home.js')}}"></script>
@endsection
