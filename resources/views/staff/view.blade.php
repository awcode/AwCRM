<div class="row">
	<div class="col-xs-8">
		<h4><?=$staff['firstname']?></h4>
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-briefcase"></i>
					<span>Staff Details</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					<a class="expand-link"><i class="fa fa-expand"></i></a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<div class="card">
					{!! HTML::linkAction("StaffController@getEdit", 'Edit', array($staff['id']), array('class'=>'btn btn-default pull-right')) !!}
					<h4 class="page-header"><?=$staff['firstname']?></h4>
					<p>
						@if($staff['email'])
						<a href="mailto:<?=$staff['email']?>"><i class="fa fa-envelope"></i> <?=$staff['email']?></a> <br>
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
		
	</div>
	<div class="col-xs-4">
		
		
	</div>
</div>
  		
<script type="text/javascript">
$(document).ready(function() {
	
});
</script>	  		

{!! HTML::linkAction("StaffController@getIndex", "Cancel") !!} - 
{!! HTML::linkAction("StaffController@getDelete", "Delete", array($staff['id'])) !!}
