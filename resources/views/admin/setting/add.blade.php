@extends('layouts.admin')

@section('title')
    <title>Thêm setting</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header', ['name' => 'Setting', 'key' => 'Add'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('settings.store') . '?type=' . request()->type}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Config Key</label>
                                <input type="text" class="form-control @error('config_key') is-invalid @enderror" name="config_key"
                                    placeholder="Nhập config key" value="{{ old('config_key') }}">
                                @error('config_key')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @if (request()->type === 'Text')
                                <div class="form-group">
                                    <label>Config Value</label>
                                    <input type="text" class="form-control @error('config_value') is-invalid @enderror" name="config_value"
                                        placeholder="Nhập config value" value="{{ old('config_value') }}">
                                    @error('config_value')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                @elseif(request()->type === 'Textarea')
                                <div class="form-group">
                                    <label>Config Value</label>
                                    <textarea class="form-control @error('config_value') is-invalid @enderror" name="config_value" rows="5" placeholder="Nhập config value">
                                        {{ old('config_value') }}
                                    </textarea>
                                    @error('config_value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
