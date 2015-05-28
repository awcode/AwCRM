<?php namespace AwCore\Providers;

use Illuminate\Support\ServiceProvider;


class ModuleServiceProvider extends ServiceProvider{
	
	public function register(){
		
	}
	
	public function queueScript($name, $src){
		//[[TODO - Lots of extra functionality can be added here, for styles too]]
		global $AWCORE_LOAD_SCRIPTS;
		
		$AWCORE_LOAD_SCRIPTS[$name]['src'] = $src;
		
	}
}