						<li>
							<a href="{{URL::to('/')}}">
								<i class="fa fa-dashboard"></i>
								<span class="hidden-xs">Dashboard</span>
							</a>
						</li>
						
						

						{!! $menuContent !!}

						<li class="dropdown">
							<a href="#" class="dropdown-toggle">
								<i class="fa fa-user"></i>
								<span class="hidden-xs">Staff</span>
							</a>
							<ul class="dropdown-menu">
								<li>{!! HTML::link('staff', 'View Staff') !!}</li>
								<li>{!! HTML::link('staff/new', 'Add Staff') !!}</li>
							</ul>
						</li>
