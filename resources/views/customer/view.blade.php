<div class="row">
	<div class="col-xs-8">
		<h4><?=$cust['registered_name']?></h4>
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-briefcase"></i>
					<span>Company details</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					<a class="expand-link"><i class="fa fa-expand"></i></a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<div class="card">
					{!! HTML::linkAction("CustomerController@getEdit", 'Edit', array($cust['cust_id']), array('class'=>'btn btn-default pull-right')) !!}
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
				</div>
			</div>
		</div>
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-bar-chart"></i>
					<span>Activity</span>
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
						<div class="col-xs-12 col-md-6">
							Events
							@if (count($eventtype_icons) > 0)
								@foreach ($eventtype_icons as $event_link)
									<a href="#" onclick="popupNewEvent({{ $event_link['id'] }}, {{ $cust['cust_id'] }}); return false;">
									<i class="{{ $event_link['icon'] }}"></i>
									Add {{ $event_link['name'] }}
									</a>
								@endforeach
								<hr>
							@endif
							@if (count($customer_events) > 0)
								@foreach ($customer_events as $event)
									{{ $event['type_name'] }} - {{ date("D jS F H:i", strtotime($event['start'])) }} - {{ $event['title'] }} <br>
								@endforeach
							@endif
						</div>
						<div class="col-xs-12 col-md-6">
							Orders
							{!! HTML::linkAction("OrderController@getNew", 'Add Order', array($cust['cust_id']), array('class'=>'btn btn-default pull-right')) !!}
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
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
		
		@if (count($addresses) > 0)
			<h4>Addresses - {!! HTML::link('customeraddress/new/'.$cust['cust_id'], 'Add') !!}</h4>
			@foreach ($addresses as $address)
			<div class="box">
				<div class="box-header">
					<div class="box-name">
						<i class="fa fa-home"></i>
						<span>Address: {{ $address['address1'] }}</span>
					</div>
					<div class="box-icons">
						<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						<a class="expand-link"><i class="fa fa-expand"></i></a>
						<a class="close-link"><i class="fa fa-times"></i></a>
					</div>
					<div class="no-move"></div>
				</div>
				<div class="box-content">
					<div class="card address">
						{!! HTML::linkAction("CustomerAddressController@getEdit", 'Edit', array($address['address_id'], $cust['cust_id']), array('class'=>'btn btn-default pull-right')) !!}
						<h4>Address:</h4>
						<p>
							<span>{{ $address['address1'] }}</span> <br>
							<span>{{ $address['address2'] }}</span> <br>
							<span>{{ $address['address3'] }}</span> <br>
							<span>{{ $address['address_city'] }}</span> <br>
							<span>{{ $address['address_province'] }}</span> <br>
							<span>{{ $address['address_postcode'] }}</span> <br>
							<span>{{ $address['country_name'] }}</span> <br>
						</p>
					</div>
				</div>
			</div>
			@endforeach
		@else
			<h4>No Addresses - {!! HTML::link('customeraddress/new/'.$cust['cust_id'], 'Add') !!}</h4>
		@endif
		
	</div>
</div>
  		
<script type="text/javascript">
$(document).ready(function() {
	
});
</script>	  		

{!! HTML::linkAction("CustomerController@getIndex", "Cancel") !!} - 
{!! HTML::linkAction("CustomerController@getDelete", "Delete", array($cust['cust_id'])) !!}
