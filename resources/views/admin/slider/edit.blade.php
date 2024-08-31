@extends('layouts.admin')

@section('title')
    <title>Thêm slider</title>
@endsection

@section('css')
    <link href="{{asset('admins/slider/edit/edit.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header', ['name' => 'Slider', 'key' => 'Add'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('sliders.update', ['id'=>$slider->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên slider</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    placeholder="Nhập tên slider" 
                                    value="{{old('name') ?? $slider->name }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Mô tả</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    name="description"
                                    rows="8"
                                >
                                    {{ old('description') ?? $slider->description }}
                                </textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ảnh sản phẩm</label>
                                <input type="file" class="form-control-file"
                                    name="image_path">
                                <div class="col-md-4 feature_image_container">
                                    <img class="feature_image" src="{{$slider->image_path}}" alt="">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
