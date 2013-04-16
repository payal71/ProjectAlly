<?php
	class CalendarController extends AppController{
		public $name = 'Calendar';
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
		
		public function index(){
			
		}
		
		/* CALENDAR SPECIFIC FUNTIONS */
		function eventtype() {
				$this->EventType->recursive = 0;
				$this->set('eventTypes', $this->EventType->find('all'));
		}
		
		function eventtype_view($id = null) {
			if(!$id) {
				$this->Session->setFlash('Invalid event type', 'error');
				$this->redirect(array('action' => 'eventtype'));
			}
			$this->set('eventType', $this->EventType->read(null, $id));
		}
	
		function eventtype_add() {
			if (!empty($this->data)) {
				$this->EventType->create();
				if ($this->EventType->save($this->data)) {
					$this->Session->setFlash('The event type has been saved', 'success');
					$this->redirect(array('action' => 'eventtype'));
				} else {
					$this->Session->setFlash('The event type could not be saved. Please, try again.', 'error');
				}
			}
		}
	
		function eventtype_edit($id = null) {
			if (!$id && empty($this->data)) {
				$this->Session->setFlash('Invalid event type', 'error');
				$this->redirect(array('action' => 'eventtype'));
			}
			if (!empty($this->data)) {
				if ($this->EventType->save($this->data)) {
					$this->Session->setFlash('The event type has been saved', 'success');
					$this->redirect(array('action' => 'eventtype'));
				} else {
					$this->Session->setFlash('The event type could not be saved. Please, try again.', 'error');
				}
			}
			if (empty($this->data)) {
				$this->data = $this->EventType->read(null, $id);
			}
		}
	
		function eventtype_delete($id = null) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for event type', 'error');
				$this->redirect(array('action' => 'eventtype'));
			}
			if ($this->EventType->delete($id)) {
				$this->Session->setFlash('Event type deleted', 'success');
				$this->redirect(array('action'=>'eventtype'));
			}
			$this->Session->setFlash('Event type was not deleted', 'error');
			$this->redirect(array('action' => 'eventtype'));
		}
		function event() {
			if($this->Session->read('role')==1)
				$this->set('events', $this->Event->find('all'));			
			else
				$this->set('events', $this->Event->find('all', array('conditions' => array('profile_id' => $this->Session->read('id')))));
		}
			
		function event_view($id = null) {
			if (!$id) {
				$this->Session->setFlash('Invalid event', 'error');
				$this->redirect(array('action' => 'event'));
			}
			$this->set('event', $this->Event->read(null, $id));
		}
		
		function leave_view($id = null) {
			if (!$id) {
				$this->Session->setFlash('Invalid event', 'error');
				$this->redirect(array('action' => 'event'));
			}
			$this->set('event', $this->Event->read(null, $id));
		}
		
		function event_add() {
			if (!empty($this->data)) {
				$this->Event->create();
				if ($this->Event->save($this->data)) {
					$this->Session->setFlash('The event has been saved', 'success');
					$this->redirect(array('action' => 'event'));
				} else {
					$this->Session->setFlash('The event could not be saved. Please, try again.', 'error');
				}
			}
			$this->set('eventTypes', $this->Event->EventType->find('list'));
		}
		
		function leave_add() {
			if (!empty($this->data)) {
				$this->Event->create();
				$this->Profile->updateAll(array('leave_request' => 'Profile.leave_request + 1'), array('Profile.id' => $this->Session->read('id')));
				if ($this->Event->save($this->data)) {
					$this->Session->setFlash('The leave has been successfully requested.', 'success');
					$this->redirect(array('controller' => 'Employee', 'action' => 'index'));
				} else {
					$this->Session->setFlash('The leave could not be saved. Please, try again.', 'error');
				}
			}
			$this->set('eventTypes', $this->Event->EventType->find('list'));
		}
		
		function event_edit($id = null) {
			$this->set('events', $this->Event->find('first', array('conditions' => array('Event.id' => $id))));
			if (!$id && empty($this->data)) {
				$this->Session->setFlash('Invalid event', 'error');
				$this->redirect(array('action' => 'event'));
			}
			if (!empty($this->data)) {
				if ($this->Event->save($this->data)) {
					$this->Session->setFlash('The event has been saved', 'success');
					$this->redirect(array('action' => 'event'));
				} else {
					$this->Session->setFlash('The event could not be saved. Please, try again.', 'error');
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Event->read(null, $id);
			}
			$this->set('eventTypes', $this->Event->EventType->find('list'));
		}
		
		function leave_edit($id = null) {
			$this->set('events', $this->Event->find('first', array('conditions' => array('Event.id' => $id))));
			if (!$id && empty($this->data)) {
				$this->Session->setFlash('Invalid event', 'error');
				$this->redirect(array('controller' => 'Employee', 'action' => 'index'));
			}
			if (!empty($this->data)) {
				if ($this->Event->save($this->data)) {
					$this->Session->setFlash('The event has been saved', 'success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('The event could not be saved. Please, try again.', 'error');
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Event->read(null, $id);
			}
			$this->set('eventTypes', $this->Event->EventType->find('list'));
		}
		
		function event_delete($id = null) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for event', 'error');
				$this->redirect(array('action'=>'event'));
			}
			if ($this->Event->delete($id)) {
				$this->Session->setFlash('Event deleted', 'success');
				$this->redirect(array('action'=>'event'));
			}
			$this->Session->setFlash('Event was not deleted', 'error');
			$this->redirect(array('action' => 'event'));
		}
		
		function leave_delete($id = null) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for event', 'error');
				$this->redirect(array('controller' => 'Employee', 'action' => 'index'));
			}
			if ($this->Event->delete($id)) {
				$this->Profile->updateAll(array('leave_request' => 'Profile.leave_request - 1'), 
										  array('Profile.id' => $this->Session->read('id')));
				$this->Session->setFlash('Event deleted', 'success');
				$this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash('Event was not deleted', 'error');
			$this->redirect(array('action' => 'index'));
		}
		
		function leave_remove($id = null) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for event', 'error');
				$this->redirect(array('controller' => 'Employee', 'action' => 'index'));
			}
			if ($this->Event->delete($id)) {
				$this->Session->setFlash('Event deleted', 'success');
				$this->redirect(array('controller' => 'Employee', 'action' => 'index'));
			}
			$this->Session->setFlash('Event was not deleted', 'error');
			$this->redirect(array('controller' => 'Employee', 'action' => 'index'));
		}
		
		// The feed action is called from "webroot/js/ready.js" to get the list of events (JSON)
		function event_feed($id=null) {
			$this->layout = "ajax";
			$vars = $this->params['url'];
			$conditions = array('conditions' => array('UNIX_TIMESTAMP(start) >=' => $vars['start'], 'UNIX_TIMESTAMP(start) <=' => $vars['end']));
			$events = $this->Event->find('all', $conditions);
			foreach($events as $event) {
				if($event['Event']['all_day'] == 1) {
					$allday = true;
					$end = $event['Event']['start'];
				} else {
					$allday = false;
					$end = $event['Event']['end'];
				}
				if($event['Event']['event_type_id'] == 4 || $event['Event']['event_type_id'] == 8){
					if($event['Event']['status'] == 'Approved'){
					$data[] = array(
							'id' => $event['Event']['id'],
							'title'=>$event['Event']['title'],
							'start'=>$event['Event']['start'],
							'end' => $end,
							'allDay' => $allday,
							'url' => Router::url('/') . 'Employee/event_view/'.$event['Event']['id'],
							'details' => $event['Event']['details'],
							'className' => $event['EventType']['color']
					);
					}else{
						$data[] = array();
					}
				}else{
					$data[] = array(
							'id' => $event['Event']['id'],
							'title'=>$event['Event']['title'],
							'start'=>$event['Event']['start'],
							'end' => $end,
							'allDay' => $allday,
							'url' => Router::url('/') . 'Calendar/event_view/'.$event['Event']['id'],
							'details' => $event['Event']['details'],
							'className' => $event['EventType']['color']
					);
				}
				
			}
			$this->set("json", json_encode($data));
		}
	
	        // The update action is called from "webroot/js/ready.js" to update date/time when an event is dragged or resized
		function event_update() {
			$vars = $this->params['url'];
			$this->Event->id = $vars['id'];
			$this->Event->saveField('start', $vars['start']);
			$this->Event->saveField('end', $vars['end']);
			$this->Event->saveField('all_day', $vars['allday']);
		}
}
?>