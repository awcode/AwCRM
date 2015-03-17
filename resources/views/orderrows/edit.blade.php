{!! Form::open(array('url'=>'#', 'method'=>'post', 'class'=>'', 'id'=>'form_new_row')) !!}
	<div class="form-group">
		{!! Form::label('item_title', 'Item Title')  !!}
		{!! Form::text('item_title', "", array('class'=>' form-control')) !!}
	</div>
	<div class="form-group">
		{!! Form::label('item_price', 'Item Price')  !!}
		{!! Form::text('item_price', "", array('class'=>' form-control')) !!}
	</div>
	<div class="form-group">
		{!! Form::label('item_type', 'Item Type')  !!}
		{!! Form::text('item_type', "Custom", array('class'=>' form-control')) !!}
	</div>

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
