<?php
namespace Repositories\Contact;

use Contact;
use Repositories\AbstractEloquentRepository;

class EloquentContactRepository extends AbstractEloquentRepository implements ContactInterface { 
  	/**
   	* @var Model
   	*/
  	protected $model;
 
  	/**
   	* Constructor
   	*/
  	public function __construct(Contact $model)
  	{
		parent::__construct();
    	$this->model = $model;
  	}
 
 
}
