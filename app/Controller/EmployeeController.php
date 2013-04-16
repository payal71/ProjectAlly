<?php
	class EmployeeController extends AppController{
		public $name = 'Employee';
		public $helpers = array('Html','Form');
		public $components = array('Session');
		public $uses = array('UserInfo', 'Profile', 'EventType', 'Event');
		
		public function beforeFilter(){
			parent::beforeFilter();
			//TO INDICATE MAX LEAVE THAT IS ALLOWED
			$max_leave = 21;
			$this->set(compact('max_leave'));
			//TO NOTIFY PENDING USER REQUEST
			$notify = $this->Profile->find('count', array('conditions' => array('Profile.status' => 0)));
			$this->set(compact('notify'));
			$this -> set('currentUser', $this->Profile->find('first' ,array('conditions' => 
																	array('Profile.id' => $this->Session->read('id')))));
		}
		
		public function index() {
			$title_for_layout = 'Home';
			$this->set(compact('title_for_layout'));
			$this -> set('users', $this->Profile->find('all' ,array('conditions' => 
																	array('Profile.id >' => 'Profile.id',
																			'Profile.status' => '1'))));
			//TO LIST CURRENT LEAVE STATUS
			$this->set('leaveStatus', $this->Event->find('all' ,array('conditions' => 
																	array('Event.profile_id' => $this->Session->read('id')))));
			
		}

		public function pendingUsers() {
			$this->set(compact('title_for_layout'));
			$this->set('proUser', $this->Profile->find('all'));
		}
		
		public function designateAdmin($id = null){
			$this->Profile->updateAll(array('Profile.userRole' => '2'), array('Profile.id' => $id));
			$this->Session->setFlash('User had been designated as Administrator', 'success');
			$this->redirect(array('controller' => 'Employee', 'action' => 'viewProfile', $id));
		}
		
		public function viewProfile($id = null){
			$this->Profile->id = $id;
			if($id==$this->Session->read('id'))
				$this->redirect(array('controller' => 'Employee', 'action' => 'userProfile'));
			else
				$this->set('proUser', $this->Profile->find('first', array('conditions' => array('Profile.id' => $id))));
		}
		
		public function removeUser($id = null) {
			$this->Profile->id = $id;
			$this->Profile->delete($id);
			$this->redirect(array('controller' => 'Employee', 'action' => 'pendingUsers'));
		}
		
		public function approveUser($id = null) {
			$this->Profile->id = $id;
			$this->Profile->updateAll(array('Profile.status' => '1'), array('Profile.id' => $id));
			
			$this->redirect(array('controller' => 'Employee', 'action' => 'pendingUsers'));
		}
		
		public function userProfile() {
			$this->set('proUser', $this->Profile->find('first', array('conditions' => 
													array('Profile.id' => $this->Session->read('id')))));
		}
		
		public function editProfile(){
			$this->set('proUser', $this->Profile->find('first', array('conditions' => 
														array('Profile.id' => $this->Session->read('id')))));
		}
		
		public function updateProfile(){
			$this->Profile->updateAll(array('Profile.user_name' => "'".$this->data['Profile']['user_name']."'",
											'Profile.input_email' => "'".$this->data['Profile']['input_email']."'",
											'Profile.user_dob' => "'".$this->data['Profile']['user_dob']."'", 
											'Profile.user_gender' => "'".$this->data['Profile']['userGender']."'", 
											'Profile.work_email' => "'".$this->data['Profile']['work_email']."'", 
											'Profile.user_address' => "'".$this->data['Profile']['user_address']."'", 
											'Profile.user_mobile' => "'".$this->data['Profile']['user_mobile']."'", 
											'Profile.user_photo' => "'".$this->data['Profile']['user_photo']."'", 
											'Profile.user_home' => "'".$this->data['Profile']['user_home']."'",
											'Profile.modified' => "'".CakeTime::format('Y-m-d H:i:s', time())."'"),
									  array('Profile.id' => $this->Session->read('id')));
				
			$this->Profile->updateAll(array('Profile.user_name' => "'".$this->data['Profile']['user_name']."'",
											'Profile.input_email' => "'".$this->data['Profile']['input_email']."'"),
									  array('Profile.id' => $this->Session->read('id')));
			
			$this->redirect(array('controller' => 'Employee', 'action' => 'userProfile'));
		}

	}
?>