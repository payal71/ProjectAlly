<?php 
	
	echo $this->Html->script('jquery-1.8.0.min.js');
	echo $this->Html->script('jquery-ui-1.8.23.custom.min.js');
	echo $this->Html->css('jquery-ui-1.8.23.custom.css');
	
?>
		<div class="row-fluid">
			<div class="span12">
				<div class="span5 well">
					<!-- MAIN CONTENT -->
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
					?></td>
					</tr>
					</table>
				<br/>
				<?php 
				if($this->Session->read('role') == 1){
					if($proUser['Profile']['user_role'] != 2){
						echo $this->Html->link('Designate as Admin', array('action' => 'designateAdmin', $proUser['Profile']['id']), array('class' => 'btn btn-danger'));
					}
					elseif($proUser['Profile']['user_role'] == 2){
						echo $this->Html->link('Revoke Admin rights', array('action' => 'revokeAdmin', $proUser['Profile']['id']), array('class' => 'btn btn-danger'));
					}
				}
			}
			?>
			</div>
		</div>
	</div>
