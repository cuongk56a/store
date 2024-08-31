@extends('layouts.admin')

@section('title')
    <title>Sửa sản phẩm</title>
@endsection

@section('css')
    <link href="{{asset('vendors/seclect2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admins/product/edit/edit.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header', ['name'=> 'Products', 'key'=>'Edit'])
        <form action="{{ route('products.update', ['id'=>$product->id])}}" method="POST" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            @csrf
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text"
                                    class="form-control"
                                    name="name"
                                    placeholder="Nhập tên menu"
                                    value="{{$product->name}}"
                                >
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input type="text"
                                    class="form-control"
                                    name="price"
                                    placeholder="Nhập tên giá sản phẩm"
                                    value="{{$product->price}}"
                                >
                            </div>
                            <div class="form-group">
                                <label>Ảnh sản phẩm</label>
                                <input type="file"
                                    class="form-control-file"
                                    name="feature_image_path"
                                >
                                <div class="col-md-4 feature_image_container">
                                    <div class="row">
                                        <img class="feature_image" src="{{$product->feature_image_path}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ảnh chi tiết sản phẩm</label>
                                <input type="file"
                                    multiple
                                    class="form-control-file"
                                    name="image_path[]"
                                >
                                <div class="col-md-12 container_image_detail">
                                    <div class="row">
                                        @foreach ($product->images as $productImageItem)
                                            <div class="col-md-3">
                                                <img class="image_detail_product" src="{{$productImageItem->image_path}}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Chọn danh mục</label>
                                <select class="form-control select2_init" name="category_id">
                                    <option value="">Chọn danh mục</option>
                                    {{!! $htmlOption !!}}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nhập tags cho sản phẩm</label>
                                <select class="form-control tags_select_choose" name="tags[]" multiple="multiple">
                                    @foreach ($product->tags as $tagItem)
                                        <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Nội dung</label>
                                <textarea class="form-control tinymce_editor_init" name="contents" rows="8">{{$product->content}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script src="{{asset('vendors/seclect2/select2.min.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/171pgu980eccqyy1qmkwn5tipnrxdzh5uh2bnpqtf5imfnh7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{asset('admins/product/add/tinymce.min.js')}}"></script>
    <script src="{{asset('admins/product/add/add.js')}}"></script>
@endsection