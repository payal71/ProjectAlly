<div class="row-fluid">
	<div class="events view well span6">
	<h2>Event</h2>
		<dl class="dl-horizontal"><?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><u><?php echo __('Event Type'); ?></u></dt>
			<br/>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($event['EventType']['name'], array('controller' => 'Calendar', 'action' => 'eventtype_view', $event['EventType']['id'])); ?></dd>
			<br/>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Title'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['Event']['title']; ?></dd>
			<br/>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Details'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['Event']['details']; ?></dd>
			<br/>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Status'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['Event']['status']; ?></dd>
			<br/>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Start'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['Event']['start']; ?></dd>
			<br/>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('End'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php if($event['Event']['all_day'] != 1) { echo $event['Event']['end']; } else { echo "N/A"; } ?></dd>
			<br/>
	        <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('All Day'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php if($event['Event']['all_day'] == 1) { echo "Yes"; } else { echo "No"; } ?></dd>
			<br/>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['Event']['created']; ?></dd>
			<br/>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modified'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['Event']['modified']; ?></dd>
		</dl>
	</div>
	<div class="actions span6">
		<ul class="nav nav-tabs nav-stacked span3">
			<li><?php echo $this->Html->link('Edit Event', array('action' => 'event_edit', $event['Event']['id'])); ?> </li>
			<li><?php echo $this->Html->link('Delete Event', array('action' => 'event_delete', $event['Event']['id']), null, sprintf(__('Are you sure you want to delete this %s event?', true), $event['EventType']['name'])); ?> </li>
			<li><?php echo $this->Html->link('Manage Events', array('action' => 'event')); ?> </li>
			<li><?php echo $this->Html->link('View Calendar', array('action' => 'index')); ?></li>
		</ul>
	</div>
</div>