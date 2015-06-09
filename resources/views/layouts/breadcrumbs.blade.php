				<div class="row">
					<div id="breadcrumb" class="col-xs-12">
						<a href="#" class="show-sidebar">
							<i class="fa fa-bars"></i>
						</a>
						<ol class="breadcrumb pull-left">
							@foreach($breadcrumbs as $crumb)
								<li><a href="{{ $crumb[0] }}">{{ $crumb[1] }}</a></li>
							@endforeach
						</ol>
						<div id="social" class="pull-right"><!--
							<a href="#"><i class="fa fa-google-plus"></i></a>
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-linkedin"></i></a>
							<a href="#"><i class="fa fa-youtube"></i></a>-->
						</div>
					</div>
				</div>
