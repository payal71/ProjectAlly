<?php 
	
	echo $this->Html->script('jquery-1.8.0.min.js');
	echo $this->Html->script('jquery-ui-1.8.23.custom.min.js');
	echo $this->Html->css('jquery-ui-1.8.23.custom.css');
	
?>
		<div class="row-fluid">
			<div class="span12">
				<!-- MAIN CONTENT -->
				<div class="span12">		
					<?php //echo $this->Html->image($proUser['Profile']['userPhoto'], array('class' => 'img-polaroid'));?>
					<h1><?php echo $project['AddProject']['projectName']; ?></h1><br/>
					<h3><?php echo $project['AddProject']['projectDescription']; ?></h3><br/>
				</div>
				<br/>	
				<div class="span3">
					<?php 					
					echo $this->element('view_members'); 
					?>
				</div>
				
				<div class="span5">
					<!-- LIST OF USERS THAT CAN BE ADDED GOES HERE -->
					<table class="table table-bordered">
						<caption>Project Staff</caption>
						<thead>
							<tr>
								<th>User Name</th>
								<th>Company Name</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$members = $project['AddProject']['projectMembers'];
								$addedmembers = explode(",", $members);
								foreach ($users as $proUser):
							?> 
								<tr>
									<?php 
										foreach ($addedmembers as $addedmember):
											//echo $addedmember . "<br>";
											if ($addedmember != $proUser['Profile']['id'])
											{
												$flag = 0;
											}
											else 
											{
												$flag = 1;
												break;
											}
										endforeach;
										if ($flag == 0)
										{
									?>
									<td> <?php echo $this->Html->link($proUser['Profile']['userName'], 
																array('controller' => 'Employee', 'action' => 'viewProfile', $proUser['Profile']['id'])); ?> </td>
									<td> <?php echo $proUser['Profile']['companyName'];?> </td>
									<td> <?php echo $this->Html->link('Add User', array('controller' => 'Project', 'action' =>'addMember','user_id' => $proUser['Profile']['id'], 'proj_id' => $project['AddProject']['id'])); ?>
								    </td>
								    <?php 
										}
									?>
								</tr>
								
							<?php 
								endforeach;
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
