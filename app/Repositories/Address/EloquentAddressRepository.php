<?php
namespace Repositories\Address;

use Address;
use Repositories\AbstractEloquentRepository;
use Repositories\Country\CountryInterface as CountryInterface ;

class EloquentAddressRepository extends AbstractEloquentRepository implements AddressInterface { 
	/**
	* @var Model
	*/
	protected $model;
 
	/**
	* Constructor
	*/
	public function __construct(Address $model, CountryInterface $country)
	{
		parent::__construct();
		$this->model = $model;
		$this->country = $country;
	}
 	public function addToResultRow($row){
		if(!isset($this->allcountry)) $this->allcountry = $this->country->all();

		$key = $address['country_id'];
        if(isset($this->allcountry[$key])){$row['country_name'] = $this->allcountry[$key]['country'];}
        else{$row['country_name'] = "";}

		return $row;
	}
	

}
