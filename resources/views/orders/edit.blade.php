<h2><?=(($order['order_id'])?"Edit":"New")?> Order <?=$order['order_id']?> - <?=$cust['company_name']?></h2>
{!! Form::open(array('url' => '#', 'class'=>'form')) !!}

{!! Form::label('order_status', 'Status')  !!}
{!! Form::text("order_status", $order['order_status'] , array('class'=>'form-control')) !!}

{!! Form::label('order_confirmed', 'Confirmed?')  !!}
{!! Form::checkbox("order_confirmed", 1, $order['order_confirmed'] , array('class'=>'form-control')) !!}<br>

{!! Form::label('order_cur_id', 'Currency')  !!}
{!! Form::text("order_cur_id", $order['order_cur_id'] , array('class'=>'form-control')) !!}

{!! Form::label('order_due_date', 'Balance Due date')  !!}
{!! Form::text("order_due_date", $order['order_due_date'] , array('class'=>'form-control')) !!}

{!! Form::label('user_id', 'Salesperson')  !!}
{!! Form::select('user_id', $allstaff, $order['user_id'] , array('class'=>'form-control')) !!}

<br>

{!! Form::hidden('cust_id', $cust['cust_id']) !!}
{!! Form::hidden('order_id', $order['order_id']) !!}
{!! Form::submit('Save', array('class'=>'btn btn-default')) !!}
{!! HTML::linkAction("OrderController@getView", 'Cancel', array($order['order_id']), array('class'=>'btn')) !!}

{!! Form::close() !!}
