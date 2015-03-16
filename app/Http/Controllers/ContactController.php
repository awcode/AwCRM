<?php
namespace AwCRM\Http\Controllers;

use Repositories\Contact\ContactInterface as ContactInterface ;
use Repositories\Event\EventInterface as EventInterface ;
use URL;
use Validator;
use Input;
use Redirect;

class ContactController extends BaseController
{
	protected $layout = "layouts.main";

	public function __construct(ContactInterface $contact, EventInterface $event) { 
		parent::__construct($event);
		$this->contact = $contact;
		$this->event = $event;
		$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->beforeFilter('auth', array('only'=>array('getDashboard')));
	}
	
	public function getIndex() {
        //Cant access directly
    }

    
    public function getEdit($id, $cust_id) {
        $contact = $this->contact->find($id);
        
        $this->doLayout("contact.edit")
                ->with("contact", $contact)
                ->with("cust_id", $cust_id);
        
        $this->title = "Edit ".$contact['firstname'];
    }
 
    public function getDelete($id, $cust_id) {
        $cust = Customer::find($id);
        $cust->delete();
        return Redirect::to('/customer')->with('message', ' deleted!');
    }
 
    public function getNew($cust_id) {
        $this->doLayout("contact.edit")
        		->with("contact", $this->contact->getEmptyArr())
        		->with("cust_id", $cust_id);
    }
 
 	public function postEdit($id, $cust_id){
 		return $this->_update($id);
 	}
 	
 	public function postNew(){
 		return $this->_update();
 	}
 	
    private function _update() {
    	$arr = $this->contact->addUpdatePost();
        
        return Redirect::to('/customer/view/'.$arr['cust_id'])->with('message', 'Contact '.(($arr['saveaction']=="update")?'Updated':'added').'!');
    }
}
