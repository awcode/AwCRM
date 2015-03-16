{!! Form::open(array('url'=>'#', 'class'=>'form-signup')) !!}
	<h2 class="form-signup-heading">Event Types</h2>

	<ul>
		@foreach($errors->all() as $error)
			<li>{!! $error !!}</li>
		@endforeach
	</ul>

	{!! Form::label('event_type_name', 'Name')  !!}
	{!! Form::text('event_type_name', $eventtype['event_type_name'], array('class'=>' form-control')) !!}

	{!! Form::label('event_type_color', 'Color')  !!}
	{!! Form::text('event_type_color', $eventtype['event_type_color'], array('class'=>' form-control')) !!}

	{!! Form::label('event_type_icon', 'Icon')  !!}
	{!! Form::text('event_type_icon', $eventtype['event_type_icon'], array('class'=>' form-control')) !!}
	
	{!! Form::label('event_type_config', 'Config')  !!}
	{!! Form::textarea('event_type_config', $eventtype['event_type_config'], array('class'=>' form-control')) !!}
	
	<br>
	<a href="#" onclick="$(this).next('div').toggle(); return false;">Advanced</a>
	<div class="form-group" style="display:none;">
		{!! Form::label('event_type_config_pastfuture', 'Universal Event')  !!}
		{!! Form::radio('event_type_config_pastfuture', 0, ($eventtypeconfig['pastfuture'] == 0)) !!}<br>
		{!! Form::label('event_type_config_pastfuture', 'Past Activity')  !!}
		{!! Form::radio('event_type_config_pastfuture', 1, ($eventtypeconfig['pastfuture'] == 1)) !!}<br>
		{!! Form::label('event_type_config_pastfuture', 'Future Schedule')  !!}
		{!! Form::radio('event_type_config_pastfuture', 2, ($eventtypeconfig['pastfuture'] == 2)) !!}<br>
		<hr>
		{!! Form::label('event_type_config_nodeadline', 'No Deadline')  !!}
		{!! Form::checkbox('event_type_config_nodeadline', 1, $eventtypeconfig['nodeadline'] ) !!}<br>
		<hr>
		{!! Form::label('event_type_config_noduration', 'No Duration')  !!}
		{!! Form::checkbox('event_type_config_noduration', 1, $eventtypeconfig['noduration'] ) !!}<br>
		<hr>
		{!! Form::label('event_type_config_showcustomer', 'Show in customer')  !!}
		{!! Form::checkbox('event_type_config_showcustomer', 1, $eventtypeconfig['showcustomer'] ) !!}<br>
	</div>
				
	{!! Form::hidden('event_type_id', $eventtype['event_type_id']) !!}

	{!! Form::submit('Save', array('class'=>'btn btn-large btn-primary btn-block'))!!}
{!! Form::close() !!}
