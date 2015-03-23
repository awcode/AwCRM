<a href="#" onclick= "addNewTransportRow(); return false;" class="btn btn-default pull-right">Add Transport</a>
<script type="text/javascript">
    	function addNewTransportRow() {
		$.ajax({
			mimeType: 'text/html; charset=utf-8', // ! Need set mimeType only when run from local file
			url: base_url+'/transportersio/newrow',
			type: 'GET',
			success: function(data) {
				var form = $(data);
					
				OpenModalBox('Add Row', form);
				$('#modalbox').addClass("wide");
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
