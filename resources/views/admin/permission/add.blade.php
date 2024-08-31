@extends('layouts.admin')

@section('title')
    <title>Thêm permission</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header', ['name' => 'Permission', 'key' => 'Add'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('permissions.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Chọn phân quyền cha</label>
                                <select class="form-control" name="module_parent">
                                    <option value="0">Phân quyền</option>
                                    @foreach(config('permission.table_module') as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    @foreach (config('permission.module_childrent') as $itemChildrent)    
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="{{$itemChildrent}}"  name="module_childrent[]">
                                            {{$itemChildrent}}
                                        </label>
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
    </div>
@endsection
