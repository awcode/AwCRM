<?php
namespace AwCore\Http\Controllers;
use Repositories\Address\AddressInterface as AddressInterface ;
use URL;
use Validator;
use Input;
use Redirect;

class AddressController extends BaseController
{
	protected $layout = "layouts.main";

	public function __construct(AddressInterface $address) {
		parent::__construct();
		$this->address = $address;
		$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->beforeFilter('auth', array('only'=>array('getDashboard')));
    	$this->link_type="";
	}
	
	public function getIndex() {
        //Cant access directly
    }
    
    public function getEdit($id, $link_id) {
        $address = $this->address->find($id);
        $allcountry = $this->address->allCountrySelectArr();
        
        $this->doLayout("address.edit")
                ->with("address", $address)
                ->with("link_id", $link_id)
                ->with("link_type", $this->link_type)
                ->with("allcountry", $allcountry);
        
        $this->title = "Edit Address";
    }
 
    public function getDelete($id) {
        $record = $this->address->find($id);
        $record->delete();
    }
 
    public function getNew($link_id) {
        $allcountry = $this->address->allCountrySelectArr();

        $this->doLayout("address.edit")
        		->with("address", $this->address->getEmptyArr())
                ->with("link_id", $link_id)
                ->with("link_type", $this->link_type)
                ->with("allcountry", $allcountry);
    }
 
 	public function postEdit($id){
 		return $this->_update($id);
 	}
 	
 	public function postNew(){
 		return $this->_update();
 	}
 	
    private function _update() {
    	$arr = $this->address->addUpdatePost();
        
        if(Input::get('return_url')){$return = Input::get('return_url');}
        else{$return = $_SERVER['HTTP_REFERER'];}
        return Redirect::to($return)->with('message', 'Address '.(($arr['saveaction']=="update")?'Updated':'added').'!');
    }
}
