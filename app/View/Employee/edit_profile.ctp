<?php 
	echo $this->Html->script('jquery-1.8.0.min.js');
	echo $this->Html->script('jquery-ui-1.8.23.custom.min.js');
	echo $this->Html->css('jquery-ui-1.8.23.custom.css');
	echo $this->Html->css('jquery-ui.css');
	echo $this->Html->script('jquery-ui.js');
?>
	<script>
	 $(function() {
	        $( "#datepicker" ).datepicker({
	            changeMonth: true,
	            yearRange: '-40:-20',
	            changeYear: true
	        });
	    });
    </script>

		<div class="row-fluid">
			<div class="span12">
				<!-- Main content -->
				<!-- form using cakephp -->
				<?php
					echo $this->Form->create('Profile',array('class' => 'form-horizontal', 'url' => array('controller' => 'Employee',
																									'action' => 'updateProfile')));
					echo $this->Html->image('default-profile.jpg', array('class' => 'img-polaroid'));
					echo "<div class=\"control-group\">";
						echo $this->Form->file('user_photo', array('label' => false));
					echo "</div>";
					
					echo "<div class=\"control-group\">";
						echo $this->Form->label('user_name', 'Name', array('class' => 'control-label'));
						echo $this->Form->input('user_name', array('label' => false,
															'value' => $proUser['Profile']['user_name']));
					echo "</div>";
				
					echo "<div class=\"control-group\">";
						echo $this->Form->label('input_email', 'Email', array('class' => 'control-label'));
						echo $this->Form->input('input_email', array('label' => false,
															'value' => $proUser['Profile']['input_email']));
						echo "</div>";

					echo "<div class=\"control-group\">";
						echo $this->Form->label('user_dob', 'Date of Birth', array('class' => 'control-label'));
						echo $this->Form->input('user_dob', array('label' =>false,
																'id' => false,
																'id' => 'datepicker',
															    'value' => $proUser['Profile']['user_dob']));
					echo "</div>";
					
					echo "<div class=\"control-group\">";
						echo $this->Form->label('user_gender', 'Gender', array('class' => 'control-label'));
						echo $this->Form->radio('user_gender', array('Male' => 'Male', 'Female' => 'Female'),
														  array('label' => false, 
														  		'legend' => false,
																'value' => $proUser['Profile']['user_gender']));
														  
					echo "</div>";
					
					echo "<div class=\"control-group\">";
						echo $this->Form->label('work_email', 'Work Email', array('class' => 'control-label'));
						echo $this->Form->input('work_email', array('label' => false,
																'value' => $proUser['Profile']['work_email']));
					echo "</div>";
					
					?>
						<legend>Contact Details</legend>
					<?php 
					
					echo "<div class=\"control-group\">";
						echo $this->Form->label('user_address', 'Address', array('class' => 'control-label'));
						echo $this->Form->textarea('user_address', array('label' => false,
																'value' => $proUser['Profile']['user_address']));
					echo "</div>";
					
					echo "<div class=\"control-group\">";
						echo $this->Form->label('user_mobile', 'Mobile', array('class' => 'control-label'));
						echo $this->Form->input('user_mobile', array('label' => false,
																'value' => $proUser['Profile']['user_mobile']));
					echo "</div>";
					
					echo "<div class=\"control-group\">";
						echo $this->Form->label('user_home', 'Home', array('class' => 'control-label'));
						echo $this->Form->input('user_home', array('label' => false,
																'value' => $proUser['Profile']['user_home']));
					echo "</div>";
					
					echo "<div class=\"control-group\">";
					echo "<div class=\"controls\">";
						echo $this->Form->submit('Save Changes',array('class' => 'btn'));
						echo $this->Form->end();
					echo "</div>";
					echo "</div>";
				?>
				
			</div>
		</div>
