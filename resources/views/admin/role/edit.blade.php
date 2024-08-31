@extends('layouts.admin')

@section('title')
    <title>Sửa vai trò</title>
@endsection

@section('css')
    
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header', ['name' => 'Role', 'key' => 'Edit'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ route('roles.update',['id'=>$role->id]) }}" method="POST" style="width: 100%">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tên vai trò</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên vai trò"
                                    value="{{ old('name') ?? $role->name }}">
                            </div>
                            <div class="form-group">
                                <label>Mô tả vai trò</label>
                                <textarea class="form-control" name="display_name" placeholder="Nhập mô tả vai trò">
                                    {{ old('display_name') ?? $role->display_name }}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                @foreach ($permissions as $permissionItem)
                                <div class="card border-primary mb-3 col-md-12">
                                    <div class="card-header" style="background-color: aquamarine">
                                        <label>
                                            <input type="checkbox" class="checkbox_wapper">
                                        </label>
                                        Module: {{$permissionItem->name}}
                                    </div>
                                    <div class="row">
                                        @foreach($permissionItem->permissionsChildrent as $permissionChildrentItem)
                                        <div class="card-body text-primary col-md-3">
                                            <label>
                                                <input 
                                                    type="checkbox"
                                                    {{ $permissionRole->contains('id', $permissionChildrentItem->id) ? 'checked':''}}
                                                    name="permission_id[]"
                                                    value="{{$permissionChildrentItem->id}}"
                                                    class="checkbox_childrent"
                                                >
                                            </label>
                                            {{$permissionChildrentItem->name}}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset("admins/role/add/add.js")}}"></script>
@endsection
