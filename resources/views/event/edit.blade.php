{!! Form::open(array('url'=>'event/new', 'method'=>'post', 'class'=>'')) !!}
			<h4 class="page-header">Add new event</h4>
			<div class="form-group">
				{!! Form::label('event_type_id', 'Type')  !!}
				{!! Form::select('event_type_id', $eventtypedd, $event['event_type_id'], array('class'=>' form-control')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('event_title', 'Event Title')  !!}
				{!! Form::text('event_title', $event['event_title'], array('class'=>' form-control')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('scheduled', 'Scheduled')  !!}<br>
				{!! Form::text('scheduled', $scheduled_date, array('class'=>'datetimepicker form-control ')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('event_desc', 'Event Description')  !!}
				{!! Form::textarea('event_desc', $event['event_desc'], array('class'=>' form-control')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('customers', 'Customers')  !!}<br>
				{!! Form::text('customers', $event['customers'], array('class'=>'form-control ')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('event_status', 'Pending')  !!}
				{!! Form::radio('event_status', 0, ($event['event_status'] == 0)) !!}<br>
				{!! Form::label('event_status', 'Completed')  !!}
				{!! Form::radio('event_status', 1, ($event['event_status'] == 1)) !!}<br>
				{!! Form::label('event_status', 'Cancelled')  !!}
				{!! Form::radio('event_status', -1, ($event['event_status'] == -1)) !!}<br>
			</div>
			<div class="form-group">
				@if( $event['type_config']['noduration'] > 0)
				No duration
				@else
				Will have Duration 
				@endif
			</div>
			<div class="form-group">
				@if( $event['type_config']['nodeadline'] > 0)
				No deadline
				@else
				Will have Deadline 
				@endif
			</div>
			
			<a href="#" onclick="$(this).next('div').toggle(); return false;">Staff</a>
			<div class="form-group" style="display:none;">
				@foreach($allstaff as $id=>$staff)
					{!! Form::checkbox('save_user_id_'.$id, $id, ((in_array($id, $sel_staff))?true:false), array('class'=>'save_users', 'id'=>'save_user_id_'.$id)) !!}
					{!! Form::label('save_user_id_'.$id, $staff['firstname']." ".$staff['lastname'])  !!}
					<br>
				@endforeach
				{!! Form::hidden('users', "~".Auth::user()->id."~", array('class'=>'form-control ', 'id'=>'users')) !!}
			</div>
			{!! Form::hidden('event_id', $event['event_id']) !!}
			{!! Form::hidden('return_url', $return_url) !!}
			{!! Form::submit('Update Event', array('class'=>'btn btn-large btn-primary btn-block'))!!}
			<div class="clearfix"></div>
{!! Form::close() !!}

<script>
$(document).ready(function() {

	$(".devoops-modal .show_types").change(function(){
		$("#calendar").fullCalendar( 'refetchEvents' );
	});
	$(".devoops-modal .show_users").change(function(){
		$("#calendar").fullCalendar( 'refetchEvents' );
	});
	$(".devoops-modal .datetimepicker").datetimepicker();
	
	$(".devoops-modal .save_users").change(function(){
		var items = []; 
		$.each($(".devoops-modal input.save_users:checked"), function() {items.push($(this).val());})
		$("#users").val("~"+items.join("~")+"~");
	});
});
</script>
