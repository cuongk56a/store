@extends('layouts.master')

@section('title')
    <title>E-Shopper</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection

@section('content')
    <section id="form"><!--form-->
		<div class="container">
			@if(session('thongbao'))
				<div class="alert alert-success" style="justify-content: center">
					{{ session('thongbao') }}
				</div>
			@endif
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
						<div class="login-form"><!--login form-->
							<h2>Đăng nhập</h2>
							<form action="{{route('postLogin')}}" method="POST">
								@csrf
								<div>
									<input type="email" placeholder="Email Address" name="email"/>
									@error('email')
	                                    <span style="color: red">{{ $message }}</span>
	                                @enderror
								</div>
								<div>
									<input type="password" placeholder="Mật khẩu" name="password"/>
									@error('password')
	                                    <span style="color: red">{{ $message }}</span>
	                                @enderror
								</div>
								<span>
									<input type="checkbox" class="checkbox" name="remember_me"> 
									Ghi nhớ đăng nhập
								</span>
								<button type="submit" class="btn btn-default">Đăng nhập</button>
							</form>
						</div><!--/login form-->
					</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Tạo tài khoản mới!</h2>
						<form action="{{route('postRegister')}}" method="POST">
							@csrf
							<input type="text" placeholder="Tên người dùng" name="name"/>
							@error('name')
                        		<span style="color: red">{{ $message }}</span>
                            @enderror
							<input type="email" placeholder="Email Address" name="email"/>
							@error('email')
                        		<span style="color: red">{{ $message }}</span>
                            @enderror
							<input type="password" placeholder="Mật khẩu" name="password"/>
							@error('password')
                        		<span style="color: red">{{ $message }}</span>
                            @enderror
							<button type="submit" class="btn btn-default">Đăng ký</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection

@section('js')
    <script src="{{asset('home/home.js')}}"></script>
@endsection
	
	
	
	
