<?php
namespace Repositories\Payments;

use Payments;
use Repositories\AbstractEloquentRepository;

class EloquentPaymentsRepository extends AbstractEloquentRepository implements PaymentsInterface { 
  	/**
   	* @var Model
   	*/
  	protected $model;
 
  	/**
   	* Constructor
   	*/
  	public function __construct(Payments $model)
  	{
		parent::__construct();
		$this->model = $model;
  	}
 
 
}
