						<li>
							<a href="{{URL::to('/')}}">
								<i class="fa fa-dashboard"></i>
								<span class="hidden-xs">Dashboard</span>
							</a>
						</li>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle">
								<i class="fa fa-shopping-cart"></i>
								<span class="hidden-xs">Orders</span>
							</a>
							<ul class="dropdown-menu">
								<li>{!! HTML::link('orders', 'View Orders') !!}</li>
								<li>{!! HTML::link('orders/new', 'Add Order') !!}</li>
							</ul>
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
