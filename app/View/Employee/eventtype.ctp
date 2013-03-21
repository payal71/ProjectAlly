<div class="row-fluid">
	<div class="eventTypes index well span6">
		<h2>Event Types</h2>
		<table class="table table-condensed">
		<tr>
				<th>Name</th>
	            <th>Color</th>
				<th class="actions"></th>
				<th class="actions"></th>
		</tr>
		<?php
		$i = 0;
		foreach ($eventTypes as $eventType):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $eventType['EventType']['name']; ?>&nbsp;</td>
	        <td><?php echo $eventType['EventType']['color']; ?>&nbsp;</td>
			<td class="actions">
				<a href="<?php echo $this->Html->url(array('action' => 'eventtype_view', $eventType['EventType']['id']));?>" class="btn btn-small"><i class="icon-eye-open"></i> <strong>View</strong></a>
	        </td>
			<td class="actions">
				<a href="<?php echo $this->Html->url(array('action' => 'eventtype_edit', $eventType['EventType']['id'])); ?>" class="btn btn-small"><i class="icon-edit"></i> <strong>Edit</strong></a>
			</td>
		</tr>
	<?php endforeach; ?>
		</table>
	</div>
	<div class="actions span6">
		<ul class="nav nav-tabs nav-stacked span3">
			<li><?php echo $this->Html->link('New Event Type', array('action' => 'eventtype_add')); ?></li>
			<li><?php echo $this->Html->link('Manage Events', array('controller' => 'Employee', 'action' => 'event')); ?></li>
	        <li><?php echo $this->Html->link('View Calendar', array('controller' => 'Employee', 'action' => 'viewCalendar')); ?></li>
		</ul>
	</div>
</div>