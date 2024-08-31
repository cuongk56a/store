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
                    <!--features_items-->
                    <div class="features_items">
                        <h2 class="title text-center">Sản Phẩm</h2>
                        @foreach ($list as $item)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ $item->feature_image_path }}"
                                                alt="{{ $item->feature_image_name }}" />
                                            <h2>{{ number_format($item->price) }} VNĐ</h2>
                                            <p>{{ $item->name }}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>{{ number_format($item->price) }}</h2>
                                                <p>{{ $item->name }} VNĐ</p>
                                                <a  href="#" 
                                                    class="btn btn-default add-to-cart add_to_cart"
                                                    data-url="{{route('cart.add', ['id'=>$item->id])}}"
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
                                                <a href="{{route('products.show',['id'=>$item->id])}}" target="_blank">
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
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{asset('home/home.js')}}"></script>
@endsection
