<?php

namespace Repositories;

use Schema;
use Input;
use DB;
use Doctrine\DBAL\Driver\PDOMySql\Driver;

abstract class AbstractEloquentRepository {
 
	/**
	* Return all users
	*
	* @return Illuminate\Database\Eloquent\Collection
	*/
	public function all()
	{
		return $this->_all();
	}	
	protected function _all()
	{
		$arr = $this->model->all()->toArray();
		if(count($arr)){
			$new_arr = array();
			$primary = $this->model->getKeyName();
			foreach($arr as $k=>$v){
				$key = $v[$primary];
				$new_arr[$key] = $v;
			}
			$arr = $new_arr;
		}
		return $arr;
	}


	public function find($id)
	{
		return $this->_find($id);
	}
	protected function _find($id)
	{
		$find = $this->model->find($id);
		if(!$find) return false;
		return $find->toArray();
	}
	
	public function delete($id)
	{
		return $this->_delete($id);
	}
	protected function _delete($id)
	{
		$record = $this->model->find($id);
        return $record->delete();
	}

	public function getWhere($key="", $type="", $value="")
	{
		return $this->_getWhere($key, $type, $value);
	}
	protected function _getWhere($key="", $type="", $value="")
	{
		return $this->model->where($key, $type, $value)->get()->toArray();
	}
	
	public function save(){
		return $this->model->save();
	}

	
	public function addUpdatePost(){
		return $this->_addUpdatePost();
	}
	protected function _addUpdatePost(){
		$arr = array();
		
		$table = $this->model->getTable();
		$primary = $this->model->getKeyName();
		
		$columns = $this->getSchema();
		
		$id = false;
		if($primary){
			if(($key = array_search($primary, $columns)) !== false) {
				unset($columns[$key]);
				$id = Input::get($primary);
				$arr[$primary] = $id;
				$arr['primary_key'] = $id;
			}
		}
			
    	if($id){
    		$record = $this->model->find($id);
    		$arr['saveaction'] = "update";
    	}else{
    		$record = new $this->model;
    		$arr['saveaction'] = "insert";
    	}
    	
        //print_r($this->model);
        foreach($columns as $col){
        	$type = DB::connection()->getDoctrineColumn($table, $col)->getType()->getName();
        	if(Input::has($col)){
        		$r = Input::get($col);
        		$record->$col = $r;
        		if(($type == "datetime" && ($r[4] !='-') && strtotime($r))){
        			$record->$col = date("Y-m-d H:i:s", strtotime($r));
        		}
        		$arr[$col] = $record->$col;
        	}else{
        		if(($type == "integer" || $type == "boolean")){
        			$record->$col = 0;
        			$arr[$col] = 0;
        		}
        	}
        }
       
        $record->save();
        
        if(!$id){
        	$arr[$primary] = $record->$primary;
        	$arr['primary_key'] = $record->$primary;
        }
		return $arr;
	}
	
	
	
	
	public function getSchema(){
		$columns = Schema::getColumnListing($this->model->getTable());
		return $columns;
	}
	
	public function getRules($set="main"){
		if (!isset($this->model->rules[$set])) return false;
		return $this->model->rules[$set];
	}
	
	public function getEmptyArr(){
        return $this->_getEmptyArr();
	}
	public function _getEmptyArr(){
		$table = $this->model->getTable();
		$columns = Schema::getColumnListing($this->model->getTable());
		$arr = array();
		
		foreach($columns as $col){
        	$type = DB::connection()->getDoctrineColumn($table, $col)->getType()->getName();
        	if($type == "Integer" && $arr[$col] == NULL){
        		$arr[$col]  = 0;
        	}else{
        		$arr[$col]  = "";
        	}
        }
        return $arr;
	}
	
	public function saveKeyValues($arr = false){
		if(!$arr){$arr = Input::get('config_fields');}
		
		if(is_array($arr) && count($arr)){
			foreach($arr as $field){
				$field = trim($field);
				if($field != ""){
					$record = $this->model->find($field);
					if(!$record){
						$record = new $this->model;
						$record->config_id = $field;
					}
			
					$record->config_value = Input::get($field);
				
					$record->save();
				}
			}
		}
	}
	
	public function getFlatKeyValues($arr = false){
		if(!$arr){$arr = $this->all();}
		$flat_arr = array();
		
		if(is_array($arr) && count($arr)){
			foreach($arr as $k=>$v){
				$flat_arr[$k] = $v['config_value'];
			}
		}
		return $flat_arr;
	}

}
