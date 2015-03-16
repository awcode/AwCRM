						<li>
							<a href="{{URL::to('/')}}">
								<i class="fa fa-dashboard"></i>
								<span class="hidden-xs">Dashboard</span>
							</a>
						</li>
						
						<li class="dropdown">
							<a href="{{URL::to('settings')}}">
								<i class="fa fa-cog"></i>
								<span class="hidden-xs">General Settings</span>
							</a>
						</li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle">
								<i class="fa fa-calendar"></i>
								<span class="hidden-xs">Events</span>
							</a>
							<ul class="dropdown-menu">
								<li>{!! HTML::link('settings/eventtypes', 'Event Types') !!}</li>
							</ul>
						</li>
