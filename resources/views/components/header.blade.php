<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i>{{ getConfigValue('phone_contact') }}</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i>{{ getConfigValue('email_contact') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="{{ getConfigValue('fb_contact') }}">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img src="{{asset('eshopper/images/home/logo.png')}}" alt="e-shopper" /></a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa"
                                data-toggle="dropdown">
                                VN
                                <span class="caret"></span>
                            </button>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa"
                                data-toggle="dropdown">
                                VNĐ
                                <span class="caret"></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            @if (Auth::check())
                                <li><a href="{{route('getAccount',['name'=>Auth::user()->name])}}"><i class="fa fa-user"></i> {{Auth::user()->name}}</a></li>
                            @endif
                            <li><a href="{{route('cart.show')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            @if (Auth::check())
                                <li><a href="{{route('getLogout')}}"><i class="fa fa-sign-out"></i>Logout</a></li>
                            @else
                                <li><a href="{{route('getLogin')}}"><i class="fa fa-lock"></i>Login</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/" class="active">Home</a></li>
                            <li><a href="{{route('products.get')}}">Sản Phẩm</a></li>
                            <li><a href="#">404</a></li>
                            <li><a href="#">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <form acction="{{route("products.listSearch")}}" method="GET">
                        @csrf
                        <div class="pull-right">
                            <input type="text" placeholder="Search" name="searchName"/>
                            <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->