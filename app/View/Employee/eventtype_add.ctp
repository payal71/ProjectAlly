<div class="row-fluid">
	<div class="eventTypes form well span6">
	<?php echo $this->Form->create('EventType');?>
		<fieldset>
	 		<legend>Add Event Type</legend>
		<?php
			echo $this->Form->input('name');
			echo $this->Form->input('color', 
						array('options' => array(
							'Blue' => 'Blue',
							'Red' => 'Red',
							'Pink' => 'Pink',
							'Purple' => 'Purple',
							'Orange' => 'Orange',
							'Green' => 'Green',
							'Gray' => 'Gray',
							'Black' => 'Black',
							'Brown' => 'Brown'
						)));
	
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit', true));?>
	</div>
	<div class="actions span6">
		<ul class="nav nav-tabs nav-stacked span3">
			<li><?php echo $this->Html->link('Manage Events', array('controller' => 'Employee', 'action' => 'event')); ?></li>
	        <li><?php echo $this->Html->link('View Calendar', array('controller' => 'Employee', 'action' => 'viewCalendar')); ?></li>
		</ul>
	</div>
</div>