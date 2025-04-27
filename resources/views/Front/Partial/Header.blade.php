
	<!-- Header section -->
	<header class="header-section header-normal">
		<div class="container-fluid">
			<!-- logo -->
			<div class="site-logo">
			<img src="{{ asset('Front/img/logo.png') }}" alt="Logo">

			</div>
			<!-- responsive -->
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			
			<!-- site menu -->
			<ul class="main-menu">
				<li><a href="{{ route('home') }}">Home</a></li>
				<li><a href="{{ route('rental') }}">Rental</a></li>
				<li><a href="{{ route('thrift') }}">Thrift</a></li>
				<li><a href="{{ route('favourites.index') }}">Favourite</a></li>
				<li><a href="{{ route('feedback') }}">Feedback</a></li>

				@if (Auth::check())
    <!-- Agar user login hai to Logout button dikhaye -->
   <strong> <a href="{{ route('logout') }}" class="btn" style="color: white">LOGOUT</a> </strong>

@else
    <!-- Agar user logout hai to Login button dikhaye -->
	<strong> <a href="{{ route('login') }}" class="btn"style="color:white" >LOGIN</a> </strong>
@endif
			</ul>
		</div>
	</header>
	<!-- Header section end -->


	