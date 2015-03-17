<?php
namespace Repositories\OrderRows;

use OrderRows;
use Repositories\AbstractEloquentRepository;
use TransportersIO\Classes\TransportersIO;

class EloquentOrderRowsRepository extends AbstractEloquentRepository implements OrderRowsInterface { 
	/**
	* @var Model
	*/
	protected $model;
 
	/**
	* Constructor
	*/
	public function __construct(OrderRows $model, TransportersIO $transporters)
	{
		$this->transporters = $transporters;
		$this->model = $model;
	}
	
	public function saveOrderRow($arr){
		if(is_array($arr) && count($arr)){	
			$row = new $this->model;
			foreach($arr as $k=>$v){
				$row->$k = $v;
			}
			$row->save();
			if(isset($arr['order_row_price'])){
				 return $arr['order_row_price'];
			}
			return 0;
		}
	}


	public function prepareRows($id){
		$rows = $this->getWhere("order_id", "=", $id);
		if($rows){
			foreach($rows as $k=>$row){
				$rows[$k]['title'] = 'Item '.$row['order_row_id'];
				if($row['order_row_type'] != "transportersio"){
					$rows[$k] = $this->transporters->prepareRow($row);
				}elseif(is_string($row['order_row_object'])){
					$obj = @unserialize($row['order_row_object']);
					if(is_array($obj)){
						if($obj['title']){
							$rows[$k]['title'] = $obj['title'];
						}
					}
				}
			}
		}
		
		return $rows;
	}
 
 
}
