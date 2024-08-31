@extends('layouts.admin')

@section('title')
    <title>Trang chủ quản lí</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header', ['name' => 'Home', 'key'=>'Home'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Trang chủ</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
