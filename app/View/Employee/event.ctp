<div class="row-fluid">
	<div class="events index well">
		<h2>Events</h2>
		<table class="table table-condensed">
		<tr>
				<th>Event type</th>
				<th>Title</th>
				<th>Status</th>
				<th>Start</th>
	            <th>End</th>
	            <th>All day</th>
				<th class="actions"></th>
				<th class="actions"></th>
				<th class="actions"></th>
		</tr>
		<?php
		$i = 0;
		foreach ($events as $event){
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td>
				<?php echo $this->Html->link($event['EventType']['name'], array('controller' => 'Employee', 'action' => 'eventtype_view', $event['EventType']['id'])); ?>
			</td>
			<td><?php echo $event['Event']['title']; ?></td>
			<td><?php echo $event['Event']['status']; ?></td>
			<td><?php echo $event['Event']['start']; ?></td>
	        <?php if($event['Event']['all_day'] == 0) { ?>
	   		<td><?php echo $event['Event']['end']; ?></td>
	        <?php } else { ?>
			<td>N/A</td>
	        <?php } ?>
	        <td><?php if($event['Event']['all_day'] == 1) { echo "Yes"; } else { echo "No"; } ?>&nbsp;</td>
			<td class="actions">
				<a href="<?php echo $this->Html->url(array('action' => 'event_view', $event['Event']['id']));?>" class="btn btn-small"><i class="icon-eye-open"></i> <strong>View</strong></a>
	        </td>
			<td class="actions">
				<a href="<?php echo $this->Html->url(array('action' => 'event_edit', $event['Event']['id'])); ?>" class="btn btn-small"><i class="icon-edit"></i> <strong>Edit</strong></a>
			</td>
			<td class="actions">
				<a href="<?php echo $this->Html->url(array('action' => 'event_delete', $event['Event']['id'])); ?>" class="btn btn-small"><i class="icon-remove"></i> <strong>Delete</strong></a>
			</td>
		</tr>
	<?php } ?>
		</table>
	</div>
	<div class="actions">
		<ul class="nav nav-tabs nav-stacked span3">
		    <li><?php echo $this->Html->link('New Event', array('controller' => 'Employee', 'action' => 'event_add')); ?></li>
			<li><?php echo $this->Html->link('Manage Events', array('controller' => 'Employee', 'action' => 'event')); ?></li>
			<li><?php echo $this->Html->link('Manage Events Types', array('controller' => 'Employee', 'action' => 'eventtype')); ?></li>
		</ul>
	</div>
</div>