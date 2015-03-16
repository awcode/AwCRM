{!! Form::open(array('url'=>'signin', 'class'=>'form-signin ')) !!}
    <h2 class="form-signin-heading">Please Login</h2>
 
    {!! Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) !!}
    {!! Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) !!}
 
    {!! Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block')) !!}
{!! Form::close() !!}
