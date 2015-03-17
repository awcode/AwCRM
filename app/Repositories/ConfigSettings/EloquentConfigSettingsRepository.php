<?php
namespace Repositories\ConfigSettings;

use ConfigSettings;
use Repositories\AbstractEloquentRepository;

class EloquentConfigSettingsRepository extends AbstractEloquentRepository implements ConfigSettingsInterface { 
	/**
	* @var Model
	*/
	protected $model;
 
	/**
	* Constructor
	*/
  	public function __construct(ConfigSettings $model)
  	{
    	$this->model = $model;
	}
	
	public function all(){
		$all = $this->_all();
		if(!isset($all['primary_currency'])) $all['primary_currency'] = "GBP";
		return $all;
	}
 
 
}
