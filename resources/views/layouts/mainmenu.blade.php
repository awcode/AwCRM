						<li>
							<a href="{{URL::to('/')}}">
								<i class="fa fa-dashboard"></i>
								<span class="hidden-xs">Dashboard</span>
							</a>
						</li>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle">
								<i class="fa fa-users"></i>
								<span class="hidden-xs">Customers</span>
							</a>
							<ul class="dropdown-menu">
								<li>{!! HTML::link('customer', 'View Customers') !!}</li>
								<li>{!! HTML::link('customer/new', 'Add Customer') !!}</li>
							</ul>
						</li>

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
