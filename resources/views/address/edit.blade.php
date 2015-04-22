<h2>Edit Address</h2>
{!! Form::open(array('url' => '#', 'class'=>'form')) !!}

{!! Form::label('address1', 'Address1')  !!}
{!! Form::text("address1", $address['address1'] , array('class'=>'form-control')) !!}

{!! Form::label('address2', 'Address2')  !!}
{!! Form::text("address2", $address['address2'] , array('class'=>'form-control')) !!}

{!! Form::label('address3', 'Address3')  !!}
{!! Form::text("address3", $address['address3'] , array('class'=>'form-control')) !!}

{!! Form::label('address_city', 'City')  !!}
{!! Form::text("address_city", $address['address_city'] , array('class'=>'form-control')) !!}

{!! Form::label('address_province', 'Province')  !!}
{!! Form::text("address_province", $address['address_province'] , array('class'=>'form-control')) !!}

{!! Form::label('address_postcode', 'Postcode')  !!}
{!! Form::text("address_postcode", $address['address_postcode'] , array('class'=>'form-control')) !!}

{!! Form::label('country_id', 'Country')  !!}
{!! Form::select('country_id', $allcountry, $address['country_id'] , array('class'=>'form-control')) !!}


<br>

{!! Form::hidden('link_id', $link_id) !!}
{!! Form::hidden('link_type', $link_type) !!}
{!! Form::hidden('address_id', $address['address_id']) !!}
{!! Form::submit('Save', array('class'=>'btn btn-default')) !!}
{!! HTML::link($_SERVER['HTTP_REFERER'], 'Cancel', array('class'=>'btn')) !!}

{!! Form::close() !!}
