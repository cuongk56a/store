@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('admins/slider/index/list.css')}}">
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header', ['name' => 'Slider', 'key'=>'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @can('slider-add')
                        <a href="{{route('sliders.create')}}" class="btn btn-success float-right m-2">Thêm</a>
                        @endcan
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên slider</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                <tr>
                                    <th scope="row">{{$slider->id}}</th>
                                    <td>{{$slider->name}}</td>
                                    <td>{{$slider->description}}</td>
                                    <td>
                                        <img class="slider_image" src="{{$slider->image_path}}" alt="">
                                    </td>
                                    <td>
                                        @can('slider-edit')
                                        <a href="{{ route('sliders.edit', ['id'=>$slider->id]) }}" class="btn btn-default">Sửa</a>
                                        @endcan
                                        @can('slider-delete')
                                        <a href="{{ route('sliders.destroy', ['id'=>$slider->id]) }}" class="btn btn-danger">Xoá</a>
                                        @endcan
                                    </td>
                                </tr>                                  
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $sliders->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
