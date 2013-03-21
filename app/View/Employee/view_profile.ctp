<?php 
	
	echo $this->Html->script('jquery-1.8.0.min.js');
	echo $this->Html->script('jquery-ui-1.8.23.custom.min.js');
	echo $this->Html->css('jquery-ui-1.8.23.custom.css');
	
?>
		<div class="row-fluid">
				<div class="span12">
				<!-- Main content -->
				<!-- form using cakephp -->
				<h1><?php echo $proUser['Profile']['userName']; ?></h1><br/>
				
				<table cellpadding="15px">
				<tr>
				<td><b>Company</b></td> 
				<td><?php 
					echo $proUser['Profile']['companyName']; 
				?></td>
				</tr>
				<tr>
				<td><b>Email Id</b></td>
				<td><?php 
					echo $proUser['Profile']['inputEmail']; 
				?></td>
				</tr>
				<tr>
				<td><b>Date Of Birth</b></td> 
				<td><?php 
					if(isset($proUser['Profile']['userDob'])) 
							echo $proUser['Profile']['userDob']; 
				?></td>
				</tr>
				<tr>
				<td><b>Work Email Id</b></td>
				<td><?php 
					if(isset($proUser['Profile']['workEmail'])) 
							echo $proUser['Profile']['workEmail']; 
				?></td>
				</tr>
				<tr>
				<td><b>Address</b></td> 
				<td><?php 
					if(isset($proUser['Profile']['userAddress'])) 
							echo $proUser['Profile']['userAddress']; 
				?></td>
				</tr>
				<tr>
				<td><b>Contacts</b></td>
				<td><?php 
					if(isset($proUser['Profile']['userMobile'])) 
							echo $proUser['Profile']['userMobile']; 
				?></td>
				<td>
				<?php	
					if(isset($proUser['Profile']['userHome'])){ 
						echo $proUser['Profile']['userHome'];
				?></td>
				</tr>
				</table>
				<br/>
				<?php 
				if($this->Session->read('role') == 1){
					if($proUser['Profile']['userRole'] != 2){
						echo $this->Html->link('Designate as Admin', array('action' => 'designateAdmin', $proUser['Profile']['id']), array('class' => 'btn btn-danger'));
					}
				}
			}
			?>
			</div>
		</div>
