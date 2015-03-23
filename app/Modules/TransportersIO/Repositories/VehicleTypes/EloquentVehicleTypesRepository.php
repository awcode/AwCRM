<?php
namespace AwCRM\Modules\TransportersIO\Repositories\VehicleTypes;

use AwCRM\Modules\TransportersIO\Models\VehicleTypes as VehicleTypes;
use Repositories\AbstractEloquentRepository;

class EloquentVehicleTypesRepository extends AbstractEloquentRepository implements VehicleTypesInterface { 
 	/**
   	* @var Model
   	*/
  	protected $model;
 
  	/**
   	* Constructor
   	*/
  	public function __construct(VehicleTypes $model)
  	{
    	$this->model = $model; 
  	}
 
 
}
