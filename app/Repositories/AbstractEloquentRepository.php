<?php

namespace Repositories;

use Schema;
use Input;
use DB;
use Module;
use App;
use Doctrine\DBAL\Driver\PDOMySql\Driver;
use Auth;

abstract class AbstractEloquentRepository {
	protected $modules;
	protected $Where = null;
	
	public function __construct(){
		if(!isset($_ENV['modules_loading'])){
			$modules = Module::enabled();
			if(is_array($modules) && count($modules)){
				$_ENV['modules_loading'] = true;
				foreach($modules as $module){
					$slug = $module['slug'];
					$path = "\AwCore\Modules\\".ucfirst($slug)."\\".ucfirst($slug)."";
					$this->modules[$slug] = App::make($path);
				}
			}
		}
	}	
	

	public function addToResultRow($row){
		return $row;
	}

	public function all()
	{
		return $this->_all();
	}	
	protected function _all()
	{
		$arr = $this->model->all()->toArray();
		if(count($arr)){
			foreach($arr as $k=>$v){
				$arr[$k] = $this->addToResultRow($v);
			}
			$arr = $this->makeKVarr($arr);
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
		$row = $find->toArray();
		$row = $this->addToResultRow($row);
		return $row;
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

	public function setWhere($key="", $type="", $value="")
	{
		return $this->_setWhere($key, $type, $value);
	}
	protected function _setWhere($key="", $type="", $value="")
	{
		if($this->Where == null){$this->Where =  $this->model;}
		$this->Where = $this->Where->where($key, $type, $value);
		return $this;
	}
	public function setOrder($key="", $dir="")
	{
		return $this->_setOrder($key, $dir);
	}
	protected function _setOrder($key="", $dir="")
	{
		if($this->Where == null){$this->Where =  $this->model;}
		$this->Where = $this->Where->OrderBy($key, $dir);
		return $this;
	}
	
	public function join($table, $key1, $match, $key2){
		$this->Where = $this->Where->join($table, $key1, $match, $key2);
		return $this;
	}
	
	public function getWhere($key="", $type="", $value="", $KV=false)
	{
		return $this->_getWhere($key, $type, $value, $KV);
	}
	protected function _getWhere($key="", $type="", $value="", $KV=false)
	{
		$this->setWhere($key, $type, $value);
		$result = $this->Where->get()->toArray();
		if($KV) $result = $this->makeKVarr($result);
		$this->Where = NULL;
		if(count($result)){
        	foreach($result as $k=>$v){
        		$result[$k] = $this->addToResultRow($v);
        	}
        }
		return $result;
	}
	
	public function save(){
		return $this->model->save();
	}
	
	public function create($arr){
		$this->model->unguard();
		return $this->model->create($arr);
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
        		}elseif(($type == "date" && ($r[4] !='-') && strtotime($r))){
        			$record->$col = date("Y-m-d", strtotime($r));
        		}
        		$arr[$col] = $record->$col;
        	}else{
        		if($col == "user_id"){
					if(Auth::check()){
						$record->$col = Auth::user()->id;
        				$arr[$col] = Auth::user()->id;
					}
				}elseif(($type == "integer" || $type == "boolean")){
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
				if(isset($v['config_value'])) $flat_arr[$k] = $v['config_value'];
			}
		}
		return $flat_arr;
	}

	public function makeKVarr($arr, $primary = false){
		$new_arr = array();
		if(!$primary) $primary = $this->model->getKeyName();

		foreach($arr as $k=>$v){
			$key = $v[$primary];
			$new_arr[$key] = $v;
		}
		return $new_arr;
	}
}
