@extends('layouts.admin')

@section('title')
    <title>Sửa user</title>
@endsection

@section('css')
    <link href="{{asset('vendors/seclect2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admins/user/add/add.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header', ['name' => 'User', 'key' => 'Edit'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('users.update', ['id'=>$user->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text" class="form-control" name="name"
                                    placeholder="Nhập tên" value="{{ old('name') ?? $user->name }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email"
                                    placeholder="Nhập email" value="{{ old('email') ?? $user->email}}">
                            </div>
                            <div class="form-group">
                                <label>Chọn vai trò</label>
                                <select name="role_id[]" class="form-control select2_init" multiple>
                                    <option value="">Chọn vai trò</option>
                                    @foreach ($roles as $role)
                                        <option 
                                            {{$rolesOfUser->contains('id', $role->id) ? 'selected' : ''}}
                                            value="{{$role->id}}"
                                        >
                                            {{$role->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('vendors/seclect2/select2.min.js')}}"></script>
    <script src="{{asset('admins/user/add/add.js')}}"></script>
@endsection
