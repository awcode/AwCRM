<div class="row full-calendar">
	<div class="col-sm-3">
		<div id="add-new-event">
			{!! Form::open(array('url'=>'event/new', 'method'=>'post', 'class'=>'')) !!}
			<h4 class="page-header">Add new event</h4>
			<div class="form-group">
				{!! Form::label('event_type_id', 'Type')  !!}
				{!! Form::select('event_type_id', $eventtypedd, array(), array('class'=>' form-control')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('event_title', 'Event Title')  !!}
				{!! Form::text('event_title', "", array('class'=>' form-control')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('event_title', 'Scheduled')  !!}<br>
				{!! Form::text('scheduled', "", array('class'=>'datetimepicker form-control ')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('event_desc', 'Event Description')  !!}
				{!! Form::textarea('event_desc', "", array('class'=>' form-control')) !!}
			</div>
			<a href="#" onclick="$(this).next('div').toggle(); return false;">Staff</a>
			<div class="form-group" style="display:none;">
				@foreach($allstaff as $id=>$staff)
				{!! Form::checkbox('save_user_id_'.$id, $id, (($id==Auth::user()->id)?true:false), array('class'=>'save_users', 'id'=>'save_user_id_'.$id)) !!}
				{!! Form::label('save_user_id_'.$id, $staff['firstname']." ".$staff['lastname'])  !!}
				<br>
			@endforeach
			{!! Form::hidden('users', "~".Auth::user()->id."~", array('class'=>'form-control ', 'id'=>'users')) !!}
			</div>
			{!! Form::submit('Add Event', array('class'=>'btn btn-large btn-primary btn-block'))!!}
			<div class="clearfix"></div>
			{!! Form::close() !!}
		</div>
		<div id="external-events">
			
			<h4 class="page-header" id="events-templates-header">Staff</h4>
			@foreach($allstaff as $id=>$staff)
				{!! Form::checkbox('show_users[]', $id, (($id==Auth::user()->id)?true:false), array('class'=>'show_users')) !!}
				{!! Form::label('user_id_'.$id, $staff['firstname']." ".$staff['lastname'])  !!}
				<br>
			@endforeach
			
			<h4 class="page-header" id="events-templates-header">Types</h4>
			@foreach($eventtypes as $id=>$type)
				{!! Form::checkbox('show_types[]', $id, true, array('class'=>'show_types')) !!}
				{!! Form::label('type_id_'.$id, $type['event_type_name'])  !!}
				<br>
			@endforeach
		</div>
	</div>
	<div class="col-sm-9">
		<div id="calendar"></div>
	</div>
</div>
<script>
$(document).ready(function() {
	// Set Block Height
	SetMinBlockHeight($('#calendar'));
	// Create Calendar
	DrawFullCalendar();
	$(".show_types").change(function(){
		$("#calendar").fullCalendar( 'refetchEvents' );
	});
	$(".show_users").change(function(){
		$("#calendar").fullCalendar( 'refetchEvents' );
	});
	$(".datetimepicker").datetimepicker();
	
	$(".save_users").change(function(){
		var items = []; 
		$.each($("input.save_users:checked"), function() {items.push($(this).val());})
		$("#users").val("~"+items.join("~")+"~");
	});
});
</script>
