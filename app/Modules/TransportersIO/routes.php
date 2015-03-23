<?php

Route::group(array('module'=>'TransportersIO','namespace' => 'AwCRM\Modules\TransportersIO\Controllers'), function() {

    //Your routes belong to this module.
	Route::group(['middleware' => 'auth'], function()
	{
		Route::controller('transportersio', 'TransportersIOController');
	});  
    
});


