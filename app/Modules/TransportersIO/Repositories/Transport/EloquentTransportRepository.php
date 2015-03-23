<?php
namespace AwCore\Modules\TransportersIO\Repositories\Transport;

use AwCore\Modules\TransportersIO\Models\Transports as Transports;
use Repositories\AbstractEloquentRepository;

class EloquentTransportRepository extends AbstractEloquentRepository implements TransportInterface { 
 	/**
   	* @var Model
   	*/
  	protected $model;
 
  	/**
   	* Constructor
   	*/
  	public function __construct(Transports $model)
  	{
    	$this->model = $model; 
  	}
 
 
}
