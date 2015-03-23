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
 
	public function all(){
		$addresses = $this->_all();
		$allcountry = $this->country->all();
        
        if(count($addresses)){
        	foreach($addresses as $k=>$v){
        		$key = $v['country_id'];
        		if(isset($allcountry[$key])){$addresses[$k]['country_name'] = $allcountry[$key]['country'];}
        		else{$addresses[$k]['country_name'] = "";}
        	}
        }
		return $addresses;
	}

	public function find($id){
		$address = $this->_find($id);
		$allcountry = $this->country->all();
        
        $key = $address['country_id'];
        if(isset($allcountry[$key])){$address['country_name'] = $allcountry[$key]['country'];}
        else{$address['country_name'] = "";}
        
		return $address;
	}

	public function getWhere($key="", $type="", $value=""){
		$addresses = $this->_getWhere($key, $type, $value);
		$allcountry = $this->country->all();
        
        if(count($addresses)){
        	foreach($addresses as $k=>$v){
        		$key = $v['country_id'];
        		if(isset($allcountry[$key])){$addresses[$k]['country_name'] = $allcountry[$key]['country'];}
        		else{$addresses[$k]['country_name'] = "";}
        	}
        }
        
		return $addresses;
	}
	
 	public function allCountrySelectArr(){
		$all = $this->country->all();
		$arr = array('0'=>"No Country");

		foreach($all as $k=>$v){
			$arr[$k] = $v['country'];
		}
		return $arr;
	} 
}
