{!! Form::open(array('url' => '#', 'class'=>'form')) !!}
<div class="row">
	<div class="col-xs-8">
		@if ($order['order_id'])
			<h4><?=(($order['order_id'])?"Edit":"New")?> Order <?=$order['order_id']?> 
			- {!! HTML::linkAction("CustomerController@getView", $cust['company_name'], array($cust['cust_id'])) !!}</h4>
		@endif
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-briefcase"></i>
					<span>Order Details</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					<a class="expand-link"><i class="fa fa-expand"></i></a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<div class="card">
					@if ($order['order_id'])
					{!! HTML::linkAction("OrderController@getEdit", 'Edit', array($cust['cust_id']), array('class'=>'btn btn-default pull-right')) !!}
					<h4 class="page-header"><?=$cust['company_name']?></h4>
					<p>
						@if($cust['company_phone'])
						<a href="tel://:<?=$cust['company_phone']?>"><i class="fa fa-phone"></i> <?=$cust['company_phone']?></a> <br>
						@endif
						@if($cust['company_email'])
						<a href="mailto:<?=$cust['company_email']?>"><i class="fa fa-envelope"></i> <?=$cust['company_email']?></a> <br>
						@endif
						@if($cust['company_website'])
						<a href="<?=$cust['company_website']?>"><i class="fa fa-globe"></i> <?=$cust['company_website']?></a><br>
						@endif
						@if($cust['company_facebook'])
						<a href="<?=$cust['company_facebook']?>"><i class="fa fa-facebook"></i> <?=$cust['company_facebook']?></a><br>
						@endif
						@if($cust['company_skype'])
						<a href="skype://<?=$cust['company_skype']?>"><i class="fa fa-skype"></i> <?=$cust['company_skype']?></a><br>
						@endif
						<br>
						@if($cust['staff_name'])
						Assigned To <?=$cust['staff_name']?><br>
						@endif
						@if($cust['staff_added_name'] && ($cust['staff_added_name'] != $cust['staff_name']))
						Added By <?=$cust['staff_added_name']?><br>
						@endif
					</p>
					@else
						<div class="row">
							<div class="col-xs-6">
								{!! Form::label('company_name', 'Company Name')  !!}
								{!! Form::text("company_name", $cust['company_name'] , array('class'=>'form-control')) !!}

								{!! Form::label('customer_name', 'Customer Name')  !!}
								{!! Form::text("customer_name", "" , array('class'=>'form-control')) !!}

								{!! Form::label('company_email', 'E-Mail Address')  !!}
								{!! Form::text("company_email", $cust['company_email'] , array('class'=>'form-control')) !!}

								{!! Form::label('company_phone', 'Phone')  !!}
								{!! Form::text("company_phone", $cust['company_phone'] , array('class'=>'form-control')) !!}
							</div>
							<div class="col-xs-6">
								{!! Form::label('passenger_name', 'Passenger Name')  !!}
								{!! Form::text("passenger_name", "" , array('class'=>'form-control')) !!}

								{!! Form::label('passenger_position', 'Passenger Position')  !!}
								{!! Form::text("passenger_position", "" , array('class'=>'form-control')) !!}

								{!! Form::label('passenger_email', 'Passenger E-Mail')  !!}
								{!! Form::text("passenger_email", "" , array('class'=>'form-control')) !!}

								{!! Form::label('passenger_phone', 'Passenger Phone')  !!}
								{!! Form::text("passenger_phone", "" , array('class'=>'form-control')) !!}
							</div>
						</div>
					@endif
				</div>
			</div>
		</div>
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-shopping-cart"></i>
					<span>Purchase Details</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					<a class="expand-link"><i class="fa fa-expand"></i></a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<div class="card">
					<div class="row">
						<div class="col-xs-12">
							<a href="#" onclick= "addNewRow(); return false;" class="btn btn-default pull-right">Add Misc</a>
							
							{!! $buttons !!}
							<div class="table-responsive">
								<table id="order_rows" class="table table-striped table-hover table-condensed">
									<tr><th>Item</th><th>Price</th><th>Actions</th><tr>
									<tbody>
									<?php $row_cnt = 1; ?>
									@if (is_array($orderrows) && count($orderrows) > 0)
									@foreach ($orderrows as $orderrow)
										<tr>
											<td>{{$orderrow['title']}}</td>
											<td>{{$orderrow['order_row_price']}}</td>
											<td></td>
										</tr>
										<?php $row_cnt++ ?>
									@endforeach
									@endif
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	@if ($order['order_id'])
	<div class="col-xs-4">
		@if (count($contacts) > 0)
			<h4>Contacts - {!! HTML::link('customercontact/new/'.$cust['cust_id'], 'Add') !!}</h4>
			@foreach ($contacts as $contact)
			<div class="box">
				<div class="box-header">
					<div class="box-name">
						<i class="fa fa-user"></i>
						<span>{{ $contact['firstname'] }} {{ $contact['surname'] }} - {{ $contact['position'] }}</span>
					</div>
					<div class="box-icons">
						<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						<a class="expand-link"><i class="fa fa-expand"></i></a>
						<a class="close-link"><i class="fa fa-times"></i></a>
					</div>
					<div class="no-move"></div>
				</div>
				<div class="box-content">
					<div class="card">
						{!! HTML::linkAction("CustomerContactController@getEdit", 'Edit', array($contact['contact_id'], $cust['cust_id']), array('class'=>'btn btn-default pull-right')) !!}
						<p>
							<span>{{ $contact['firstname'] }} {{ $contact['surname'] }}</span> <br>
							@if($contact['position'])
								<span>{{ $contact['position'] }}</span> <br>
							@endif
							@if($contact['phone'])
								<span>{{ $contact['phone'] }}</span> <br>
							@endif
							@if($contact['mobile'])
								<span>{{ $contact['mobile'] }}</span> <br>
							@endif
							@if($contact['email'])
								<a href="mailto:{{ $contact['email'] }}">{{ $contact['email'] }}</a>
							@endif
						</p>
					</div>
				</div>
			</div>
			@endforeach
		@else
			<h4>No Contacts - {!! HTML::link('customercontact/new/'.$cust['cust_id'], 'Add') !!}</h4>		
		@endif
	</div>
	@endif
	
	<div class="col-xs-4">
		
			
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-money"></i>
					<span>Payment Status</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					<a class="expand-link"><i class="fa fa-expand"></i></a>
					<a class="close-link"><i class="fa fa-times"></i></a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<div class="card">
				 	{!! HTML::link('customercontact/new/'.$cust['cust_id'], 'Add') !!}
					@if (count($contacts) > 0)
						@foreach ($contacts as $contact)
						{!! HTML::linkAction("CustomerContactController@getEdit", 'Add', array($contact['contact_id'], $cust['cust_id']), array('class'=>'btn btn-default pull-right')) !!}
						<p>
							
						</p>
						@endforeach
					@else
					<h4>No Payments</h4>		
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
  		
<script type="text/javascript">
$(document).ready(function() {
	
});
var row_cnt = <?=$row_cnt?>;
function addNewRow() {
		$.ajax({
			mimeType: 'text/html; charset=utf-8', // ! Need set mimeType only when run from local file
			url: base_url+'/orderrows/new',
			type: 'GET',
			success: function(data) {
				var form = $(data);
					
				OpenModalBox('Add Row', form);
				$('#orderrow_cancel').on('click', function(){
					CloseModalBox();
				});
				$('#orderrow_delete').on('click', function(){
					
					CloseModalBox();
				});
				$('#orderrow_change').on('click', function(){
					
					CloseModalBox();
				});
		
			},
			error: function (jqXHR, textStatus, errorThrown) {
				alert(errorThrown);
			},
			dataType: "html",
			async: true
	});
}
</script>	  		
{!! Form::submit('Save', array('class'=>'btn btn-default')) !!}

{!! HTML::linkAction("OrderController@getIndex", "Cancel") !!} - 
{!! HTML::linkAction("OrderController@getDelete", "Delete", array($cust['cust_id'])) !!}

{!! Form::close() !!}
