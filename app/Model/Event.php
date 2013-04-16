<?php
class Event extends AppModel {
	public  $name = 'Event';
	public $uses = 'events';
	public  $displayField = 'title';
	public  $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'start' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		)
	);

	var $belongsTo = array(
		'EventType' => array(
			'className' => 'EventType',
			'foreignKey' => 'event_type_id'
		)
	);

}
?>
