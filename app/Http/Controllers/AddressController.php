<?php
namespace AwCore\Http\Controllers;
use Repositories\Address\AddressInterface as AddressInterface ;
use Repositories\Event\EventInterface as EventInterface ;
use URL;
use Validator;
use Input;
use Redirect;
use Customer;

class AddressController extends BaseController
{
	protected $layout = "layouts.main";

	public function __construct(AddressInterface $address, EventInterface $event) {
		parent::__construct($event);
		$this->address = $address;
		$this->event = $event;
		$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->beforeFilter('auth', array('only'=>array('getDashboard')));
	}
	
	public function getIndex() {
        //Cant access directly
    }
    
    public function getEdit($id, $cust_id) {
        $cust = Customer::find($cust_id);
        $address = $this->address->find($id);
        $allcountry = $this->address->allCountrySelectArr();
        
        $this->doLayout("address.edit")
                ->with("address", $address)
                ->with("cust_id", $cust_id)
                ->with("allcountry", $allcountry);
        
        $this->title = "Edit ".$cust->company_name;
    }
 
    public function getDelete($id, $cust_id) {
        $record = $this->address->find($id);
        $record->delete();
        return Redirect::to('/customer')->with('message', 'Customer deleted!');
    }
 
    public function getNew($cust_id) {
        $this->doLayout("address.edit")
        		->with("address", $this->address->getEmptyArr())
        		->with("cust_id", $cust_id);
    }
 
 	public function postEdit($id, $cust_id){
 		return $this->_update($id);
 	}
 	
 	public function postNew(){
 		return $this->_update();
 	}
 	
    private function _update() {
    	$arr = $this->address->addUpdatePost();
        
        return Redirect::to('/customer/view/'.$arr['cust_id'])->with('message', 'Address '.(($arr['saveaction']=="update")?'Updated':'added').'!');
    }
}
