<?php 
	echo $this->Html->script('jquery-1.8.0.min.js');
	echo $this->Html->script('jquery-ui-1.8.23.custom.min.js');
	echo $this->Html->css('jquery-ui-1.8.23.custom.css');
	$role = $this->Session->read('role');
	
?>
		<div class="row-fluid">
			<div class="span12">
				<!-- MAIN CONTENT -->
				<div class="span3">
				<?php
				 
					if ($role==1 || $role==2)
					{
						echo $this->Html->link('Add Project',
											array('controller' => 'Project', 'action' => 'addProject'),
											array('class' => 'btn'));
					}
				?>
				</div>
				<table class="table table-hover well span5">
					<caption>Projects</caption>
					<thead>
						<tr>
							<th>Project Title</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($projects as $project):
						?> 
							<tr>
								<td><?php 
									if ($role==1 || $role==2)
										echo $this->Html->link($project['AddProject']['project_name'],
													array('controller' => 'Project', 'action' => 'viewProject', $project['AddProject']['id']));
									else 
										echo $project['AddProject']['project_name'];
									?>
								</td>
								<td><?php echo $this->Html->link('View Members',array('controller' => 'Project', 'action' => 'viewMembers', $project['AddProject']['id']),array('class' => 'btn btn-info')); ?> </td>
								<td>
									<?php 
										if ($role==1 || $role==2)
											echo $this->Html->link('Delete',array('controller' => 'Project', 'action' => 'deleteProject', $project['AddProject']['id']),array('class' => 'btn btn-info'));	
									?>
										
								</td>
							</tr>
						<?php
							endforeach; 	
											
						?>
					</tbody>
				</table>
			</div>
		</div>
