<?php
namespace AwCore\Modules\TransportersIO\Repositories\TransportLegs;

use AwCore\Modules\TransportersIO\Models\TransportLegs as TransportLegs;
use Repositories\AbstractEloquentRepository;

class EloquentTransportLegsRepository extends AbstractEloquentRepository implements TransportLegsInterface { 
 	/**
   	* @var Model
   	*/
  	protected $model;
 
  	/**
   	* Constructor
   	*/
  	public function __construct(TransportLegs $model)
  	{
    	$this->model = $model; 
  	}
 
 
}
