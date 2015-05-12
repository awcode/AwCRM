<p><i class="fa fa-plus"></i>{!! HTML::linkAction("StaffController@getNew", "Add new staff") !!}</p>

<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-users"></i>
					<span>Staff</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content no-padding">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-2">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Surname</th>
							<th>Email</th>
							<th>Created</th>
							<th>Last Login</th>
							<th>Edit</th>
							@if(is_array($staff_list_view) && isset($staff_list_view['row_head']))
							{!! $staff_list_view['row_head'] !!}
							@endif
						</tr>
					</thead>
					<tbody>
						
<?php $row_cnt = 0;?>
@foreach($users as $user)
<?php $row_cnt++; ?>
						<tr>
							<td>{!! HTML::linkAction("StaffController@getView", $user['firstname'], array($user['id'])) !!}</td>
							<td>{!! HTML::linkAction("StaffController@getView", $user['lastname'], array($user['id'])) !!}</td>
							<td>{{$user['email']}}</td>
							<td>{{$user['created_at']}}</td>
							<td>{{$user['lastlogin_date']}}</td>
							<td><a href="{{URL::to('staff/edit', array($user['id']))}}"><i class="fa fa-edit"></i></a></td>
							@if(is_array($staff_list_view) && isset($staff_list_view['row_body']) && isset($staff_list_view['row_body'][$row_cnt]))
							{!! $staff_list_view['row_body'][$row_cnt] !!}
							@endif
						</tr>

@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>First Name</th>
							<th>Surname</th>
							<th>Email</th>
							<th>Created</th>
							<th>Last Login</th>
							<th>Edit</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
// Run Datables plugin and create 3 variants of settings
function AllTables(){
	
	TestTable2();
	
	LoadSelect2Script(MakeSelect2);
}
function MakeSelect2(){
	$('select').select2();
	$('.dataTables_filter').each(function(){
		$(this).find('label input[type=text]').attr('placeholder', 'Search');
	});
}


function TestTable2(){
	var asInitVals = [];
	var oTable = $('#datatable-2').dataTable( {
		"aaSorting": [[ 0, "asc" ]],
		"sDom": "<'box-content'<'col-sm-6'f><'col-sm-6 text-right'l><'clearfix'>>rt<'box-content'<'col-sm-6'i><'col-sm-6 text-right'p><'clearfix'>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sSearch": "",
			"sLengthMenu": '_MENU_'
		},
		bAutoWidth: false
	});
	var header_inputs = $("#datatable-2 thead input");
	header_inputs.on('keyup', function(){
		/* Filter on the column (the index) of this element */
		oTable.fnFilter( this.value, header_inputs.index(this) );
	})
	.on('focus', function(){
		if ( this.className == "search_init" ){
			this.className = "";
			this.value = "";
		}
	})
	.on('blur', function (i) {
		if ( this.value == "" ){
			this.className = "search_init";
			this.value = asInitVals[header_inputs.index(this)];
		}
	});
	header_inputs.each( function (i) {
		asInitVals[i] = this.value;
	});
}
$(document).ready(function() {
	// Load Datatables and run plugin on tables 
	LoadDataTablesScripts(AllTables);
	// Add Drag-n-Drop feature
	WinMove();
});
</script>				
				
