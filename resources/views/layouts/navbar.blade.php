<header id="header" id="home">
		<div class="header-top">
			<div class="container">
	  		<div class="row">
	  			<div class="col-lg-6 col-sm-6 col-4 header-top-left no-padding">
	  				<a href="mailto:ishy.singh@gmail.com">ishy.singh@gmail.com</a>					  
	  			</div>
	  			<div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding">
	  				<ul>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa fa-snapchat"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>
	  				</ul>			
	  			</div>
	  		</div>			  					
		</div>
	</div>
    <div class="container main-menu">
    	<div class="row align-items-center justify-content-between d-flex">
			<div id="logo">
				<a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
			</div>
			<nav id="nav-menu-container">
				<ul class="nav-menu">
					@if(Auth::guest())
						<li><a href="/">Home</a></li>
						<li><a href="/tools">Tools</a></li>
						<li><a href="/community">Community</a></li>
						<li><a href="/recommended">Recommended</a></li>
						{{-- <li class="menu-has-children"><a href="/blog">Blog</a></li>     --}}
						<li><a href="/contact">Contact</a></li>
						<li class="menu-has-children"><a href="">Members</a>
							<ul>
								<li><a href="/login">Login</a></li>
								<li><a href="/register">Register</a></li>
							</ul>
						</li>
					@else
						<li><a href="/dashboard">Dashboard</a></li>
						<li><a href="/tools">Tools</a></li>
						<li><a href="/community">Community</a></li>
						<li><a href="/recommended">Recommended</a></li>
						{{-- <li class="menu-has-children"><a href="/blog">Blog</a></li>     --}}
						<li class="menu-has-children"><a href="">Members</a>
							<ul>
								<li><a href="/profile">Profile</a></li>
								<li><a href="/logout">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</nav><!-- #nav-menu-container -->		    		
		</div>
	</div>
</header>