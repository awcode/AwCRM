<?php

Route::group(array('module'=>'TransportersIO','namespace' => 'AwCore\Modules\TransportersIO\Controllers'), function() {

    //Your routes belong to this module.
	Route::group(['middleware' => 'auth'], function()
	{
		Route::controller('transportersio', 'TransportersIOController');
	});  
    
});


