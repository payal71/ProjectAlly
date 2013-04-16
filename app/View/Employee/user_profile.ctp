<?php 
	echo $this->Html->script('jquery-1.8.0.min.js');
	echo $this->Html->script('jquery-ui-1.8.23.custom.min.js');
	echo $this->Html->css('jquery-ui-1.8.23.custom.css');
	
?>
		<div class="row-fluid">
				<div class="span12">
				<!-- Main content -->
				<!-- form using cakephp -->
				<?php //echo $this->Html->image($proUser['Profile']['userPhoto'], array('class' => 'img-polaroid'));?>
				<h1><?php echo $proUser['Profile']['user_name']; ?></h1><br/>
				
				<table cellpadding="15px">
				<tr>
				<td><b>Company</b></td> 
				<td><?php 
					echo $proUser['Profile']['company_name']; 
				?></td>
				</tr>
				<tr>
				<td><b>Email Id</b></td>
				<td><?php 
					echo $proUser['Profile']['input_email']; 
				?></td>
				</tr>
				<tr>
				<td><b>Date Of Birth</b></td> 
				<td><?php 
					if(isset($proUser['Profile']['user_dob'])) 
							echo $proUser['Profile']['user_dob']; 
				?></td>
				</tr>
				<tr>
				<td><b>Work Email Id</b></td>
				<td><?php 
					if(isset($proUser['Profile']['work_email'])) 
							echo $proUser['Profile']['work_email']; 
				?></td>
				</tr>
				<tr>
				<td><b>Address</b></td> 
				<td><?php 
					if(isset($proUser['Profile']['user_address'])) 
							echo $proUser['Profile']['user_address']; 
				?></td>
				</tr>
				<tr>
				<td><b>Contacts</b></td>
				<td><?php 
					if(isset($proUser['Profile']['user_mobile'])) 
							echo $proUser['Profile']['user_mobile']; 
				?></td>
				<td>
				<?php	
					if(isset($proUser['Profile']['user_home'])){ 
						echo $proUser['Profile']['user_home'];
					}	 
				?></td>
				</tr>
				</table>
				<?php
				 
					echo $this->Html->link('Edit Profile',array('controller' => 'Employee', 
																'action' => 'editProfile'),array('class' => 'btn'));
				?>
			</div>
		</div>
