<header id="header" id="home">
		<div class="header-top">
			<div class="container">
	  		<div class="row">
	  			<div class="col-lg-6 col-sm-6 col-4 header-top-left no-padding">
	  				<a href="mailto:ishy.singh@gmail.com">ishy.singh@gmail.com</a>					  
	  			</div>
	  			<div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding">
	  				<ul>
						<li><a href="https://www.facebook.com/xSunnyChopper/"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://www.twitter.com/SunnyChopper"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://www.instagram.com/SunnyChopper"><i class="fa fa-instagram"></i></a></li>
						<li><a href="https://www.snapchat.com/add/SunnyChopper"><i class="fa fa-snapchat"></i></a></li>
						<li><a href="https://www.youtube.com/channel/UCB05e10psLXdPzJnC-sWjEA"><i class="fa fa-youtube"></i></a></li>
	  				</ul>			
	  			</div>
	  		</div>			  					
		</div>
	</div>
    <div class="container main-menu">
    	<div class="row align-items-center justify-content-between d-flex">
			<div id="logo">
				<a href="/"><img src="{{ URL::asset('img/logo.png') }}" alt="SunnyChopper's Site Logo" title="SunnyChopper" /></a>
			</div>
			<nav id="nav-menu-container">
				<ul class="nav-menu">
					@if(Auth::guest())
						<li><a href="/">Home</a></li>
						<li class="menu-has-children"><a href="">Free Stuff</a>
							<ul>
								<li><a href="/blog">Tips and Advice</a></li>
								<li><a href="/books">Book Summaries</a></li>
							</ul>
						</li>

						<li><a href="/tools">Tools</a></li>
						<li><a href="/community">Community</a></li>
						<li><a href="/recommended">Recommended</a></li>
						{{-- <li class="menu-has-children"><a href="/blog">Blog</a></li>     --}}
						<li><a href="/contact">Contact</a></li>
						<li class="menu-has-children"><a href="/login">Members</a>
							<ul>
								<li><a href="/login">Login</a></li>
								<li><a href="/register">Register</a></li>
							</ul>
						</li>
					@elseif(Session::has('admin_login'))
						@if(Session::get('admin_login') == true)
							<li><a href="/admin/dashboard">Dashboard</a></li>
							<li class="menu-has-children">
								<a href="/admin/tools/view">Public Tools</a>
								<ul>
									<li><a href="/admin/tools/view">View Public Tools</a></li>
									<li><a href="/admin/summaries/new">New Book Summary</a></li>
								</ul>
							</li>
							<li class="menu-has-children">
								<a href="/admin/summaries/view">Book Summaries</a>
								<ul>
									<li><a href="/admin/summaries/view">View Book Summaries</a></li>
									<li><a href="/admin/summaries/new">New Book Summary</a></li>
								</ul>
							</li>
							<li class="menu-has-children">
								<a href="/admin/posts/view">Blog Posts</a>
								<ul>
									<li><a href="/admin/posts/view">View Blog Posts</a></li>
									<li><a href="/admin/posts/new">New Blog Post</a></li>
									<li><a href="/admin/posts/stats">Blog Post Stats</a></li>
								</ul>
							</li>
							<li class="menu-has-children">
								<a href="/admin/recommend/view">Recommendations</a>
								<ul>
									<li><a href="/admin/recommend/view">View Recommended Items</a></li>
									<li><a href="/admin/recommend/new">New Recommendation</a></li>
								</ul>
							</li>
							<li class="menu-has-children">
								<a href="/members/profile/settings">{{ Auth::user()->first_name }}</a>
								<ul>
									<li><a href="/admin/settings">Settings</a></li>
									<li><a href="/admin/logout">Logout</a></li>
								</ul>
							</li>
						@endif
					@else
						<li><a href="/">Home</a></li>
						<li><a href="/blog">Free Knowledge</a></li>
						<li><a href="/books">Book Summaries</a></li>
						<li class="menu-has-children">
							<a href="/tools">Tools</a>
							<ul>
								<li><a href="{{ url('/members/planner') }}">10X Planner</a></li>
							</ul>
						</li>
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