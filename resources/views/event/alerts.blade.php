	<div class="row" id="test">
		<div class="col-xs-12">
			<div class="row">
					
				<div id="messages-list" class="col-xs-12">
				@foreach($alert_groups as $group)
					@if(isset($alerts[$group]) && count($alerts[$group]))
						<div class="row one-list-message msg-inbox-item "> 
							<h2>{{ ucwords($group) }}</h2>
						</div>
						@foreach($alerts[$group] as $alert)
						<div class="row one-list-message msg-inbox-item is-alert" data-id="{{$alert['id']}}">
							<div class="col-xs-1 checkbox">
								<label>
									<input type="checkbox"> {{$alert['type_name']}}
									<i class="fa fa-square-o small"></i>
								</label>
							</div>
							<div class="col-xs-8 message-title"><b>{{$alert['title']}}</b> {{$alert['desc']}}</div>
							<div class="col-xs-3 message-date">{{ date("D jS F H:i", strtotime($alert['start'])) }}</div>
						</div>
						@endforeach
					@else
						<div class="row one-list-message msg-inbox-item"> 
							<h2>{{ ucwords($group) }} - no alerts</h2>
						</div>
					@endif
				@endforeach	
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">
// Add listener for redraw menu when windows resized
window.onresize = MessagesMenuWidth;
$(document).ready(function() {
	// Add class for correctly view of messages page
	$('#content').addClass('full-content');
	// Run script for change menu width
	//MessagesMenuWidth();
	$('#content').on('click','.is-alert', function(e){
		//e.preventDefault();
		//$('[id^=msg-]').removeClass('active');
		//$(this).addClass('active');
		//$('.one-list-message').slideUp('fast');
		//$('.'+$(this).attr('id')+'-item').slideDown('fast');
		var id = $(this).attr("data-id");
		popupEditEvent(id);
	});
	$('html').animate({scrollTop: 0},'slow');
});
</script>
