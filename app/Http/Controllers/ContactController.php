<?php
namespace AwCore\Http\Controllers;

use Repositories\Contact\ContactInterface as ContactInterface ;
use URL;
use Validator;
use Input;
use Redirect;

class ContactController extends BaseController
{
	protected $layout = "layouts.main";

	public function __construct(ContactInterface $contact) { 
		parent::__construct();
		$this->contact = $contact;
		$this->link_type = "";
		$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->beforeFilter('auth', array('only'=>array('getDashboard')));
	}
	
	public function getIndex() {
        //Cant access directly
    }

    
    public function getEdit($id, $link_id) {
        $contact = $this->contact->find($id);
        
        $this->doLayout("contact.edit")
                ->with("contact", $contact)
                ->with("link_type", $this->link_type)
                ->with("link_id", $link_id);
        
        $this->title = "Edit ".$contact['firstname'];
    }
 
    public function getDelete($id, $cust_id) {
        //$cust = Customer::find($id);
        //$cust->delete();
        //return Redirect::to('/customer')->with('message', ' deleted!');
    }
 
    public function getNew($link_id) {
        $this->doLayout("contact.edit")
        		->with("contact", $this->contact->getEmptyArr())
                ->with("link_type", $this->link_type)
                ->with("link_id", $link_id);
    }
 
 	public function postEdit($id){
 		return $this->_update($id);
 	}
 	
 	public function postNew(){
 		return $this->_update();
 	}
 	
    private function _update() {
    	$arr = $this->contact->addUpdatePost();
        
        if(Input::get('return_url')){$return = Input::get('return_url');}
        else{$return = $_SERVER['HTTP_REFERER'];}
        return Redirect::to($return)->with('message', 'Contact '.(($arr['saveaction']=="update")?'Updated':'added').'!');
    }
}
