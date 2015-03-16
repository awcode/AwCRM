<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>awCRM<?php if($title !="") echo " - ".$title; ?></title>

	{!! HTML::style('/bower_components/devoops/plugins/bootstrap/bootstrap.css') !!}
    {!! HTML::style('/bower_components/devoops/plugins/jquery-ui/jquery-ui.min.css') !!}
    {!! HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') !!}
    {!! HTML::style('//fonts.googleapis.com/css?family=Righteous') !!}
    {!! HTML::style('/bower_components/devoops/plugins/fancybox/jquery.fancybox.css') !!}
    {!! HTML::style('/bower_components/devoops/plugins/fullcalendar/fullcalendar.css') !!}
    {!! HTML::style('/bower_components/devoops/plugins/xcharts/xcharts.min.css') !!}
    {!! HTML::style('/bower_components/devoops/plugins/select2/select2.css') !!}
    {!! HTML::style('/bower_components/devoops/plugins/justified-gallery/justifiedGallery.css') !!}
    {!! HTML::style('/bower_components/devoops/css/style_v2.css') !!}
    {!! HTML::style('/bower_components/devoops/plugins/chartist/chartist.min.css') !!}
  
    {!! HTML::style('/css/main.css') !!}
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<!--<script src="http://code.jquery.com/jquery.js"></script>-->
		{!! HTML::script('/bower_components/devoops/plugins/jquery/jquery.min.js') !!}
		{!! HTML::script('/bower_components/devoops/plugins/jquery-ui/jquery-ui.min.js') !!}
	<!-- Include all compiled plugins (below), or include individual files as needed -->
		{!! HTML::script('/bower_components/devoops/plugins/bootstrap/bootstrap.min.js') !!}
		{!! HTML::script('/bower_components/devoops/plugins/justified-gallery/jquery.justifiedGallery.min.js') !!}
		{!! HTML::script('/bower_components/devoops/plugins/tinymce/tinymce.min.js') !!}
		{!! HTML::script('/bower_components/devoops/plugins/tinymce/jquery.tinymce.min.js') !!}
		{!! HTML::script('/bower_components/devoops/plugins/jquery-ui-timepicker-addon/jquery-ui-timepicker-addon.min.js') !!}

	<!-- All functions for this theme + document.ready processing -->
		{!! HTML::script('/js/general.js') !!}
<script type="text/javascript">
	var base_url = "{{URL::to('/')}}";
</script>    

  </head>
  <body>
  
  <!--Start Header-->
	<div id="screensaver">
		<canvas id="canvas"></canvas>
		<i class="fa fa-lock" id="screen_unlock"></i>
	</div>
	<div id="modalbox">
		<div class="devoops-modal">
			<div class="devoops-modal-header">
				<div class="modal-header-name">
					<span>Basic table</span>
				</div>
				<div class="box-icons">
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
			</div>
			<div class="devoops-modal-inner">
			</div>
			<div class="devoops-modal-bottom">
			</div>
		</div>
	</div>
	<header class="navbar">
		<div class="container-fluid expanded-panel">
			<div class="row">
				<div id="logo" class="col-xs-12 col-sm-2">
					<a href="{{URL::to('/')}}">AwCRM</a>
				</div>
				<div id="top-panel" class="col-xs-12 col-sm-10">
					<div class="row">
					@if(Auth::check())
						<div class="col-xs-8 col-sm-4">
							<div id="search">
								<input type="text" placeholder="search"/>
								<i class="fa fa-search"></i>
							</div>
						</div>
						<div class="col-xs-4 col-sm-8 top-panel-right">
							<ul class="nav navbar-nav pull-right panel-menu">
								<li class="hidden-xs">
									<a href="{{URL::to('event/alerts')}}" class="modal-link">
										<i class="fa fa-bell"></i>
										<span class="badge">{{$alert_count}}</span>
									</a>
								</li>
								<li class="hidden-xs">
									<a href="{{URL::to('event')}}">
										<i class="fa fa-calendar"></i>
										<span class="badge"></span>
									</a>
								</li>
								<li class="hidden-xs">
									<a href="{{URL::to('event/messages')}}">
										<i class="fa fa-envelope"></i>
										<span class="badge"></span>
									</a>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
										<div class="avatar">
											<!--<img src="{{URL::to('bower_components/devoops/img/avatar.jpg')}}" class="img-circle" alt="avatar" />-->
										</div>
										<i class="fa fa-angle-down pull-right"></i>
										<div class="user-mini pull-right">
											<span class="welcome">Welcome,</span>
											<span>{{ Auth::user()->firstname }}</span>
										</div>
									</a>
									<ul class="dropdown-menu">
										<li>
											<a href="{{URL::to('staff/edit', array(Auth::user()->id))}}">
												<i class="fa fa-user"></i>
												<span>Profile</span>
											</a>
										</li>
										<li>
											<a href="{{URL::to('settings')}}">
												<i class="fa fa-cog"></i>
												<span>Settings</span>
											</a>
										</li>
										<li>
											<a href="{{URL::to('logout')}}">
												<i class="fa fa-power-off"></i>
												<span>Logout</span>
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</header>
	<!--End Header-->
	<!--Start Container-->
	<div id="main" class="container-fluid">
		<div class="row">
			<div id="sidebar-left" class="col-xs-2 col-sm-2">
				<ul class="nav main-menu">
					
					@if(!Auth::check())
						<li>{!! HTML::link('/', 'Login') !!}</li>   
				    @else
						{!! $menu !!}
						
				    @endif
				
				</ul>
			</div>
			<!--Start Content-->
			<div id="content" class="col-xs-12 col-sm-10">
				{!! $breadcrumbs !!}
				<div id="maincontent" class="row">
					@if(Session::has('message'))
						<p class="bg-success">{{ Session::get('message') }}</p>
					@endif
			 
					{!! $content !!}
				</div>
			
			</div>
			<!--End Content-->
		</div>
	</div>
	<!--End Container-->
  </body>
</html>
