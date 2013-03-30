<?php echo $this->Html->script('bootstrap-datetimepicker.js'); ?>
<?php echo $this->Html->css('bootstrap-datetimepicker.min.css'); ?>
<div class="row-fluid">
	<div class="events form well span6">
	<?php echo $this->Form->create('Event');?>
		<fieldset>
		<legend>Edit Event</legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('event_type_id');
			echo $this->Form->input('title');
			echo $this->Form->input('details');
			echo $this->Form->input('start', array('type'=>'text'));
			echo $this->Form->input('end', array('type'=>'text'));
			echo $this->Form->input('all_day');
			echo $this->Form->input('status', array('options' => array(
						'Scheduled' => 'Scheduled','Confirmed' => 'Confirmed','In Progress' => 'In Progress',
						'Rescheduled' => 'Rescheduled','Completed' => 'Completed'
						)
					)
				);
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit', true));?>
	</div>
	<div class="actions span6">
		<ul class="nav nav-tabs nav-stacked span4">
			<li><?php echo $this->Html->link('View Event', array('action' => 'event_view', $this->Form->value('Event.id'))); ?></li>
			<li><?php echo $this->Html->link('Manage Events', array('action' => 'event')); ?></li>
			<li><?php echo $this->Html->link('Manage Events Types', array('action' => 'eventtype')); ?></li>
		</ul>
	</div>
</div>
