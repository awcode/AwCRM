<h2>Edit <?=$cust['company_name']?></h2>
{!! Form::open(array('url' => '#', 'class'=>'form')) !!}

{!! Form::label('company_name', 'Company Name')  !!}
{!! Form::text("company_name", $cust['company_name'] , array('class'=>'form-control')) !!}

{!! Form::label('registered_name', 'Registered Company Name')  !!}
{!! Form::text("registered_name", $cust['registered_name'] , array('class'=>'form-control')) !!}

{!! Form::label('company_email', 'E-Mail Address')  !!}
{!! Form::text("company_email", $cust['company_email'] , array('class'=>'form-control')) !!}

{!! Form::label('company_phone', 'Phone')  !!}
{!! Form::text("company_phone", $cust['company_phone'] , array('class'=>'form-control')) !!}

{!! Form::label('company_website', 'Website')  !!}
{!! Form::text("company_website", $cust['company_website'] , array('class'=>'form-control')) !!}

{!! Form::label('company_facebook', 'Facebook')  !!}
{!! Form::text("company_facebook", $cust['company_facebook'] , array('class'=>'form-control')) !!}

{!! Form::label('company_skype', 'Skype')  !!}
{!! Form::text("company_skype", $cust['company_skype'] , array('class'=>'form-control')) !!}

{!! Form::label('staff_assigned', 'Assigned Staff')  !!}
{!! Form::select('staff_assigned', $allstaff, $cust['staff_assigned'] , array('class'=>'form-control')) !!}

<br>

{!! Form::hidden('cust_id', $cust['cust_id']) !!}
{!! Form::submit('Save', array('class'=>'btn btn-default')) !!}
{!! HTML::linkAction("CustomerController@getView", 'Cancel', array($cust['cust_id']), array('class'=>'btn')) !!}

{!! Form::close() !!}
