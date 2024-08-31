@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header', ['name' => 'Permission', 'key'=>'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route("permission.create") }}" class="btn btn-success float-right m-2">Thêm</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên phân quyền cha</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                <tr>
                                    <th scope="row">{{$permission->id}}</th>
                                    <td>{{$permission->name}}</td>
                                    <td>
                                        <a href="{{ route('permissions.edit', ['id'=>$permission->id]) }}" class="btn btn-default">Sửa</a>
                                        <a href="{{ route('permissions.destroy', ['id'=>$permission->id]) }}" class="btn btn-danger">Xoá</a>
                                    </td>
                                </tr>                                  
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $permissions->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
