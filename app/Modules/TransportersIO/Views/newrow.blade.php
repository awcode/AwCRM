{!! Form::open(array('url'=>'#', 'method'=>'post', 'class'=>'', 'id'=>'form_new_row')) !!}
<div class="row">
	<div class="col-xs-12 col-md-8">
		<h3>Transport</h3>
		<div class="row">
			<div class="col-xs-6 col-md-3">
				{!! Form::label('item_price', 'Start Location')  !!}
				{!! Form::text('item_price', "", array('class'=>' form-control')) !!}
			</div>
			<div class="col-xs-6 col-md-2">
				{!! Form::label('item_price', 'Start Time')  !!}
				{!! Form::text('item_price', "", array('class'=>' form-control')) !!}
				
			</div>
			<div class="col-xs-6 col-md-3  col-md-offset-1">
				{!! Form::label('item_price', 'End Location')  !!}
				{!! Form::text('item_price', "", array('class'=>' form-control')) !!}
				
			</div>
			<div class="col-xs-5 col-md-2">
				{!! Form::label('item_price', 'End Time')  !!}
				{!! Form::text('item_price', "", array('class'=>' form-control')) !!}
				
			</div>
			<div class="col-xs-1">
				{!! Form::label('item_price', 'Fixed time')  !!}
				{!! Form::checkbox('item_price', "", array('class'=>' form-control')) !!}
			</div>
		</div>
		
	</div>
	<div class="col-xs-12 col-md-4">
		<h3>Cargo</h3>
		{!! Form::label('item_price', 'Passengers')  !!}
		{!! Form::text('item_price', "", array('class'=>' form-control')) !!}
	
	</div>
</div>
<div class="row">
	<div class="col-xs-6 col-md-3">
		<h3>Price</h3>
		{!! Form::label('item_price', 'Journey Price')  !!}
		{!! Form::text('item_price', "", array('class'=>' form-control')) !!}
	</div>

</div>
<br>

	{!! Form::submit('Add Item', array('class'=>'btn btn-large btn-primary btn-block'))!!}
			
{!! Form::close() !!}

<script type="text/javascript">
$(document).ready(function(){
	$("#form_new_row").submit(function(){
		row_cnt += 1;
		$("#order_rows").append("<tr id='new_row"+row_cnt+"'><td>"+$("#item_title").val()+"</td><td>"+$("#item_price").val()+"</td><td>"
		+"<input type='hidden' name='new_row[]' value='"+row_cnt+"'>"
		+"<input type='hidden' name='new_row_title_"+row_cnt+"' value='"+$("#item_title").val()+"'>"
		+"<input type='hidden' name='new_row_price_"+row_cnt+"' value='"+$("#item_price").val()+"'>"
		+"<input type='hidden' name='new_row_type_"+row_cnt+"' value='"+$("#item_type").val()+"'>"
		+"<a href='#' onclick='$(\"#new_row"+row_cnt+"\").remove(); return false;'><i class='fa fa-close'></i>Remove</a>"		
		+"</td></tr>");
		CloseModalBox();
		return false;
	});
});
</script>
