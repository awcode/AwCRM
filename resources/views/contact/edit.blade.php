<h2>Edit <?=$contact['firstname']?></h2>
{!! Form::open(array('url' => '#', 'class'=>'form')) !!}

{!! Form::label('firstname', 'First Name')  !!}
{!! Form::text("firstname", $contact['firstname'] , array('class'=>'form-control')) !!}

{!! Form::label('surname', 'Surname')  !!}
{!! Form::text("surname", $contact['surname'] , array('class'=>'form-control')) !!}

{!! Form::label('email', 'E-Mail Address')  !!}
{!! Form::text("email", $contact['email'] , array('class'=>'form-control')) !!}

{!! Form::label('phone', 'Phone')  !!}
{!! Form::text("phone", $contact['phone'] , array('class'=>'form-control')) !!}

{!! Form::label('mobile', 'Mobile')  !!}
{!! Form::text("mobile", $contact['mobile'] , array('class'=>'form-control')) !!}

{!! Form::label('position', 'Position')  !!}
{!! Form::text("position", $contact['position'] , array('class'=>'form-control')) !!}
<br>

{!! Form::hidden('link_id', $link_id) !!}
{!! Form::hidden('link_type', $link_type) !!}
{!! Form::hidden('contact_id', $contact['contact_id']) !!}
{!! Form::submit('Save', array('class'=>'btn btn-default')) !!}
{!! HTML::link($_SERVER['HTTP_REFERER'], 'Cancel', array('class'=>'btn')) !!}

{!! Form::close() !!}
