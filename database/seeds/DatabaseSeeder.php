<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		if(!isset($_ENV['modules_loading'])){
			$modules = Module::enabled();
			if(is_array($modules) && count($modules)){
				$_ENV['modules_loading'] = true;
				foreach($modules as $module){
					$slug = $module['slug'];
					$path = app_path()."\Modules\\".ucfirst($slug)."\Database\Seeds\\";
					if(is_dir($path)){
						$seeds = scandir($path);
						if(is_array($seeds) && count($seeds)){
							foreach($seeds as $seed){
								$this->call(str_replace(".php", "", $seed));
							}
						}
					}
					
				}
			}
		}
	}

}
