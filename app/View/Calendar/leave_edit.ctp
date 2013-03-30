<?php echo $this->Html->script('bootstrap-datetimepicker.js'); ?>
<?php echo $this->Html->css('bootstrap-datetimepicker.min.css'); ?>
<div class="row-fluid">
	<div class="events form well span6">
	<?php echo $this->Form->create('Event');?>
		<fieldset>
		<legend>Edit Event</legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('event_type_id', array('options' => array(
						'8' => 'Sickday', '4' => 'Leave'
						)));
			echo $this->Form->input('profile_id', array('type' => 'hidden', 'value' => $this->Session->read('id')));
			echo $this->Form->input('title');
			echo $this->Form->input('details');
			echo $this->Form->input('start', array('type'=>'text'));
			echo $this->Form->input('end', array('type'=>'text'));
			echo $this->Form->input('all_day');
			echo $this->Form->input('status', array('value' => 'In Progress','type'=>'hidden'));
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit', true));?>
	</div>
	<div class="actions span6">
		<ul class="nav nav-tabs nav-stacked span4">
			<li><?php echo $this->Html->link('View Event', array('action' => 'leave_view', $this->Form->value('Event.id'))); ?></li>
			<li><?php echo $this->Html->link('Manage Events', array('action' => 'event')); ?></li>
		</ul>
	</div>
</div>
