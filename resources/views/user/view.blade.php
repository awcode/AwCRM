<div class="row">
	<div class="col-xs-8">
		<h4><?=$user['firstname']?></h4>
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-briefcase"></i>
					<span>User Details</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					<a class="expand-link"><i class="fa fa-expand"></i></a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<div class="card">
					{!! HTML::linkAction("UserController@getEdit", 'Edit', array($user['id']), array('class'=>'btn btn-default pull-right')) !!}
					<h4 class="page-header"><?=$user['firstname']?></h4>
					<p>
						@if($user['email'])
						<a href="mailto:<?=$user['email']?>"><i class="fa fa-envelope"></i> <?=$user['email']?></a> <br>
						@endif
						
					</p>
				</div>
			</div>
		</div>
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-bar-chart"></i>
					<span>Activity</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					<a class="expand-link"><i class="fa fa-expand"></i></a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<div class="card">
					Coming soon!
				</div>
			</div>
		</div>
			{!! $user_single_view !!}
	</div>
	<div class="col-xs-4">
		
		
	</div>
</div>
  		
<script type="text/javascript">
$(document).ready(function() {
	
});
</script>	  		

{!! HTML::linkAction("StaffController@getIndex", "Cancel") !!} - 
{!! HTML::linkAction("StaffController@getDelete", "Delete", array($user['id'])) !!}
