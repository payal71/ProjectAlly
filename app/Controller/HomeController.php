<?php
App::uses('AppController', 'Controller');

class HomeController extends AppController {
	public $name = 'Home';
	public $helpers = array('Html','Form');
	public $components = array('Session');

	public $uses = array('UserInfo', 'Profile', 'AddProject', 'Event', 'EventType');

	
	public function beforeFilter() {
		//parent::beforeFilter();
		//next two lines are to count the number of pending users
		$notify = $this->Profile->find('count', array('conditions' => array('Profile.status' => 0)));
		$this->set(compact('notify'));
		
		//$this->disableCache();
		if ($this->params['action'] == 'index') {
			$name = $this->Session->read('name');
			$role = $this->Session->read('role');
			if (isset($name)) {
				$this->redirect(array('controller' => 'Home', 'action' => 'HomePage'));
			}
		}
	}
	
	public function index() {
		$title_for_layout = 'Home';
		$this->set(compact('title_for_layout'));
	}
	
	public function signIn(){
	
	}
	
	public function signUp(){
		if(!empty($this->data)){
			if($this->Profile->save($this->data)){
				echo "successful";
				$this->Session->setFlash('Your stuff has been saved.');
			} else {
				$this->Session->setFlash('Something went wrong please try again.');
			}
		$this->redirect(array('controller' => 'Home', 'action' => 'homePage'));
		}
	}
	
	public function HomePage() {
		$this->set('leaveRequests', $this->Profile->find('all', array('conditions' => array('Profile.leave_request !=' => 0))));
		$this->set('leaveDetails', $this->Event->find('all'));
	}
	
	public function test() {
		echo "You successfully registered with projectally....kindly wait till admin approves yours request.";
	}
	
	public function message() {
		
	}
	
	public function loginfailure() {
		
	}
			
	public function listProject() {
		$this->set(compact('title_for_layout'));
		$this->set('projects', $this->AddProject->find('all'));
	}
	
	public function approve_request($id = null, $profile_id = null, $days = null){
		if($days == 0){
			$this->Profile->updateAll(array('leave_taken' => 'Profile.leave_taken + 0.5', 
											'leave_request' => 'Profile.leave_request - 1'), 
									array('Profile.id' => $profile_id));
			
		} else{
			$this->Profile->updateAll(array('leave_taken' => 'Profile.leave_taken +'.$days, 
											'leave_request' => 'Profile.leave_request - 1'), 
									array('Profile.id' => $profile_id));
		}
		$this->Event->updateAll(array('status' => "'".Approved."'"), 
								array('Event.id' => $id));
		$this->redirect(array('controller' => 'Home', 'action' => 'HomePage'));
	}
	
	public function decline_request($id = null){
		$this->Profile->updateAll(array('leave_request' => 'Profile.leave_request - 1'), 
								array('Profile.id' => $profile_id));
		$this->Event->updateAll(array('status' => "'".Declined."'"), 
								array('Event.id' => $id));
		$this->redirect(array('controller' => 'Home', 'action' => 'HomePage'));
	}
	
}