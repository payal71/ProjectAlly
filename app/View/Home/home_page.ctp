<?php 
	$role = $this->Session->read('role');
?>
		<div class="row-fluid">
			<div class="span12">
				<!-- Main content -->
				<!-- form using cakephp -->
				<?php
				echo $this->Html->link('Project',array('controller' => 'Project', 'action' => 'listProject'),
															array('class' => 'btn'));
				
				if($role == 1){
					if($leaveRequests != null){ ?>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Name</th>
									<th>Status</th>
									<th>Title</th>
									<th>Details	</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							<?php 
							foreach($leaveRequests as $request){ 
								foreach($leaveDetails as $detail){			
									if($request['Profile']['id']==$detail['Event']['profile_id']){
										if($detail['Event']['status'] == 'In Progress'){
										echo '<tr>';
											echo '<td>';
											echo $this->Html->link($request['Profile']['userName'], array('controller' => 'Employee', 'action' => 'viewProfile', $request['Profile']['id']));
											echo '</td>';
											echo '<td>';
											echo $this->Html->tag('span', 'Pending', array('class' => 'label label-important'));
											echo '</td>';
											echo '<td>';
											echo $this->Html->link($detail['Event']['title'], array('controller' => 'Employee', 'action' => 'leave_view', $detail['Event']['id']));
											echo '</td>';
											echo '<td>';
											echo $detail['Event']['details'];
											echo '</td>';
											$difference = abs(strtotime($detail['Event']['start']) - strtotime($detail['Event']['end']));
											$days = round((($difference/60)/60)/24,0);
											?>
											<td class="actions">
												<a href="<?php echo $this->Html->url(array('action' => 'approve_request', $detail['Event']['id'], $request['Profile']['id'], $days));?>" class="btn btn-small"><i class="icon-ok"></i> <strong>Approve</strong></a>
									        </td>
											<td class="actions">
												<a href="<?php echo $this->Html->url(array('action' => 'decline_request', $detail['Event']['id'], $request['Profile']['id'])); ?>" class="btn btn-small"><i class="icon-remove"></i> <strong>Decline</strong></a>
											</td>
											
										<?php 
										echo '</tr>';
										}
									}
								}
							}?>
							
							</tbody>
						</table>
					<?php }
				}
				?>
			</div>
		</div>