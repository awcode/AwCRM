<?php
namespace AwCore\Modules\TransportersIO\Repositories\CargoGroups;

use AwCore\Modules\TransportersIO\Models\CargoGroups as CargoGroups;
use Repositories\AbstractEloquentRepository;

class EloquentCargoGroupsRepository extends AbstractEloquentRepository implements CargoGroupsInterface { 
 	/**
   	* @var Model
   	*/
  	protected $model;
 
  	/**
   	* Constructor
   	*/
  	public function __construct(CargoGroups $model)
  	{
    	$this->model = $model; 
  	}
 
 
}
