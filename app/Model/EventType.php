<?php
class EventType extends AppModel {
    public $name = 'EventType';
	public $displayField = 'name';
	public $uses = 'event_types';
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
	);

	public $hasMany = array(
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'event_type_id',
			'dependent' => false,
		)
	);

}
?>
