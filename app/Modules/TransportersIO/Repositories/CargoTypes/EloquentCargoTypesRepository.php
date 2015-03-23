<?php
namespace AwCore\Modules\TransportersIO\Repositories\CargoTypes;

use AwCore\Modules\TransportersIO\Models\CargoTypes as CargoTypes;
use Repositories\AbstractEloquentRepository;

class EloquentCargoTypesRepository extends AbstractEloquentRepository implements CargoTypesInterface { 
 	/**
   	* @var Model
   	*/
  	protected $model;
 
  	/**
   	* Constructor
   	*/
  	public function __construct(CargoTypes $model)
  	{
    	$this->model = $model; 
  	}
 
 
}
