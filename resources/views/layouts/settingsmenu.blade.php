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

						{!! $menuContent !!}
