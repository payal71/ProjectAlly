<?php 
	
	echo $this->Html->script('jquery-1.8.0.min.js');
	echo $this->Html->script('jquery-ui-1.8.23.custom.min.js');
	echo $this->Html->css('jquery-ui-1.8.23.custom.css');
	
?>
		<div class="row-fluid">
			<div class="span12">
				<!-- Main content -->
				<!-- form using cakephp -->
				<?php 
					echo $this->Html->link('Profile',array('controller' => 'Employee', 'action' => 'userProfile'), array('class' => 'btn'));
				?>
				<br/>
				<br/>
				<br/>
				<?php 
				if($this->Session->read('role') != 1){
					$leave_in_percentage = (100 * $currentUser['Profile']['leave_taken'])/21;
				
					?>						
					<div class="span6">
						<strong>Time off's used in %</strong><span class="pull-right"><?php echo ceil($leave_in_percentage) ?>%</span>
					  	<div class="progress progress-warning active">
					    	<div class="bar" style="width: <?php echo $leave_in_percentage ?>%"></div>
						</div>
					  	<p>
							<?php
							if($leave_in_percentage != 100)
								echo $this->Html->link('Request Time off',array('controller' => 'Calendar', 'action' => 'leave_add'), array('class' => 'btn btn-large pull-right'));
							else{?>
								<div class="alert">
								  <button type="button" class="close" data-dismiss="alert">&times;</button>
								  <strong>Warning!</strong> You have taken maximum number of leaves allowed..!
								</div>	
								<?php }?>
					  	</p>
					</div>
				<div class="span8">
				<?php 
				if($leaveStatus != null){ 
				?>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Name</th>
								<th>Status</th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
				<?php foreach($leaveStatus as $leave){ ?>
							<?php 
							echo '<tr>';
								echo '<td>';
								echo $leave['Event']['title'];	
								echo '</td>';
								echo '<td>';
								if($leave['Event']['status']  == 'In Progress')
									 echo $this->Html->tag('span', 'In Progress', array('class' => 'label label-important'));
								elseif ($leave['Event']['status']  == 'Approved')
									 echo $this->Html->tag('span', 'Approved', array('class' => 'label label-success'));
								elseif ($leave['Event']['status']  == 'Declined')
									 echo $this->Html->tag('span', 'Approved', array('class' => 'label label-inverse'));
								echo '</td>';
								if($leave['Event']['status']  == 'In Progress'){
									?>
									<td class="actions">
										<a href="<?php echo $this->Html->url(array('controller' => 'Calendar', 'action' => 'leave_view', $leave['Event']['id']));?>" class="btn btn-small"><i class="icon-eye-open"></i> <strong>View</strong></a>
							        </td>
									<td class="actions">
										<a href="<?php echo $this->Html->url(array('controller' => 'Calendar', 'action' => 'leave_edit', $leave['Event']['id'])); ?>" class="btn btn-small"><i class="icon-edit"></i> <strong>Edit</strong></a>
									</td>
									<td class="actions">
										<a href="<?php echo $this->Html->url(array('controller' => 'Calendar', 'action' => 'leave_delete', $leave['Event']['id'])); ?>" class="btn btn-small"><i class="icon-remove"></i><strong>Delete</strong></a>
									</td>
							<?php 
								}
								else{
									?>
									<td></td>
									<td></td>
									<td class="actions">
										<a href="<?php echo $this->Html->url(array('controller' => 'Calendar', 'action' => 'leave_remove', $leave['Event']['id'])); ?>" class="btn btn-small"><i class="icon-remove"></i><strong>Remove</strong></a>
									</td>
							<?php
								}
							echo '</tr>';
							}?>
						</tbody>
					</table>
				<?php }
				}	
				?>
				</div>
			</div>
		</div>
