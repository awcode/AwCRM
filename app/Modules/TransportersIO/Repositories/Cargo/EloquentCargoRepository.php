<?php
namespace AwCRM\Modules\TransportersIO\Repositories\Cargo;

use AwCRM\Modules\TransportersIO\Models\Cargo as Cargo;
use Repositories\AbstractEloquentRepository;

class EloquentCargoRepository extends AbstractEloquentRepository implements CargoInterface { 
 	/**
   	* @var Model
   	*/
  	protected $model;
 
  	/**
   	* Constructor
   	*/
  	public function __construct(Cargo $model)
  	{
    	$this->model = $model; 
  	}
 
 
}
