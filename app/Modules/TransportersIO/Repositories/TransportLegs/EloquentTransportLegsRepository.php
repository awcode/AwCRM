<?php
namespace AwCRM\Modules\TransportersIO\Repositories\TransportLegs;

use AwCRM\Modules\TransportersIO\Models\TransportLegs as TransportLegs;
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
