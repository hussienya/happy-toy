
<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- Internet Explorer Meta -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- First Mobile Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>لوحة التحكم</title>
		<link rel="icon" href="{{ asset('dashboard_res/images/logo.png') }}">
		<link rel="stylesheet" href="{{ asset('dashboard_res/css/bootstrap.min.css') }}"> <!-- Arabic Bootstrap -->
		<link rel="stylesheet" href="{{ asset('dashboard_res/css/all.css') }}">
		<link rel="stylesheet" href="{{ asset('dashboard_res/css/style.css') }}"> <!-- Arabic Style -->
        <!--[if lt IE 9]>
        <script src="{{ asset('dashboard_res/js/html5shiv.min.js') }}"></script>
       	<script src="{{ asset('dashboard_res/js/respond.min.js') }}"></script>
        <![endif]-->
	</head>
	<body>


		<!-- Header -->
		<header>
			<div class="menu">
				<img src="{{ asset('dashboard_res/images/logo.png') }}" class="img-fluid logo">
				<button id="menu-btn">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<nav class="navbar navbar-expand-lg">					
					<div class="collapse navbar-collapse show" id="navbarSupportedContent">
						<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin') }}">
								<i class="fas fa-tachometer-alt"></i>
								<span class="link">
									لوحة التحكم
								</span>
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item menu">
							<a class="nav-link" href="{{ url('/admin/slider') }}">
							<i class="fab fa-chromecast"></i>
								<span class="link">
									السلايدر
								</span>
							</a>
							<ul>
								<li>
									<a href="{{ url('/admin/slider/add') }}">
										<i class="fas fa-plus"></i>
										<span class="link">
											إضافة سلايد جديد
										</span>
									</a> 
								</li>
							</ul>
						</li>
						<li class="nav-item menu">
							<a class="nav-link" href="{{ url('/admin/categories') }}">
								<i class="fas fa-cubes"></i>
								<span class="link">
									التصنيفات
								</span>
							</a>
							<ul>
								<li>
									<a href="{{ url('/admin/category/add') }}">
										<i class="fas fa-plus"></i>
										<span class="link">
											إضافة تصنيف جديد
										</span>
									</a> 
								</li>
							</ul>
						</li>
						<li class="nav-item menu">
							<a class="nav-link" href="{{ url('/admin/items') }}">
								<i class="fas fa-box"></i>
								<span class="link">
									المنتجات
								</span>
							</a>
							<ul>
								<li>
									<a href="{{ url('/admin/item/add') }}">
										<i class="fas fa-plus"></i>
										<span class="link">
											إضافة منتج جديد
										</span>
									</a> 
								</li>
							</ul>
						</li>
						<li class="nav-item menu">
							<a class="nav-link" href="{{ url('/admin/brands') }}">
								<i class="fas fa-box"></i>
								<span class="link">
									العلامات التجارية
								</span>
							</a>
							<ul>
								<li>
									<a href="{{ url('/admin/brand/add') }}">
										<i class="fas fa-plus"></i>
										<span class="link">
											إضافة علامة تجارية جديدة
										</span>
									</a> 
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/about') }}">
								<i class="fas fa-info-circle"></i>
								<span class="link">
									من نحن
								</span>
							</a>
						</li>
						<li class="nav-item">
          <a class="nav-link" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('تسجيل الخروج') }}
                                    </a>
 
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
          </li>

					</div>
				</nav>
			</div>
		</header>
		<div class="overlay"></div>
		<!-- ./Header -->