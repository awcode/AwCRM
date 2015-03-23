<?php
namespace AwCRM\Modules\TransportersIO\Repositories\Transport;

use AwCRM\Modules\TransportersIO\Models\Transports as Transports;
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
