<?php

Route::group(array('module'=>'Orders','namespace' => 'AwCore\Modules\Orders\Controllers'), function() {

    //Your routes belong to this module.
	Route::group(['middleware' => 'auth'], function()
	{
		Route::controller('orders', 'OrderController');
		Route::controller('orderrows', 'OrderRowsController');
	});  
    
});


