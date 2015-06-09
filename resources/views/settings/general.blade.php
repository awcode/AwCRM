<h1>General Settings</h1>

{!! Form::open(array('url'=>'#', 'class'=>'form-signup')) !!}
	
	<ul>
		@foreach($errors->all() as $error)
			<li>{!! $error !!}</li>
		@endforeach
	</ul>
	
	@if(isset($config['primary_currency']))
	{!! Form::label('primary_currency', 'Currency ID')  !!}
	{!! Form::text('primary_currency', $config['primary_currency'], array('class'=>' form-control')) !!}
	{!! Form::hidden('config_fields[]','primary_currency') !!}
	@endif			
	

	{!! Form::submit('Save', array('class'=>'btn btn-large btn-primary btn-block'))!!}
{!! Form::close() !!}
