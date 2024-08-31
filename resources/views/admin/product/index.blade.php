@extends('layouts.admin')
@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('admins/product/index/list.css')}}">
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header', ['name' => 'Products', 'key'=>'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @can('product-add')
                        <a href="{{ route('products.create')}}" class="btn btn-success float-right m-2">Thêm</a>
                        @endcan
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $productItem)
                                <tr>
                                    <th scope="row">{{$productItem->id}}</th>
                                    <td>{{$productItem->name}}</td>
                                    <td>{{number_format($productItem->price)}}</td>
                                    <td>
                                        <img class="product_image" src="{{$productItem->feature_image_path}}" alt="">
                                    </td>
                                    <td>{{optional($productItem->category)->name}}</td>
                                    <td>
                                        @can('product-edit', $productItem->id)
                                        <a href="{{ route('products.edit', ['id'=>$productItem->id]) }}" class="btn btn-default">Sửa</a>
                                        @endcan
                                        @can('product-delete', $productItem->id)
                                        <a href="" data-url="{{ route('products.destroy', ['id'=>$productItem->id]) }}" class="btn btn-danger action_delete">Xoá</a>
                                        @endcan
                                    </td>
                                </tr>                                  
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('vendors/sweetAlert2/sweetAlert2.js')}}"></script>
    <script src="{{asset('admins/product/index/list.js')}}"></script>
@endsection