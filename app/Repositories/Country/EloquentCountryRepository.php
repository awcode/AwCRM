<?php
namespace Repositories\Country;

use Country;
use Repositories\AbstractEloquentRepository;

class EloquentCountryRepository extends AbstractEloquentRepository implements CountryInterface { 
  	/**
   	* @var Model
   	*/
  	protected $model;
 
 	/**
	* Constructor
  	*/
  	public function __construct(Country $model)
  	{
		parent::__construct();
    	$this->model = $model;
  	}
 
	
}
