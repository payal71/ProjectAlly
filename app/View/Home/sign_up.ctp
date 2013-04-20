<div class="container">
	<div class="page-header">
    	<h1>Signup with ProjectAlly</h1>
    </div>
    <div class="row">
    	<div class="span6 offset3">
        	<h4 class="widget-header"><i class="icon-gift"></i> Be a part of Project<span style="color: #52a8ec"><strong>Ally</strong></span></h4>
            <div class="widget-body">
            	<div class="center-align">
      			<!-- REGISTRATION FORM -->
				<?php
				 $options = array(
					'label' => false,
					'div' => array(
						'class' => 'controls'
						)
					);
					
					$user_role = array('0' => 'Select Role', '1' => 'Super Administrator', '2' => 'Administrator', '3' =>'Employee', '4' =>'User');
					?>
				
					<?php echo $this->Form->create('Profile',array('class' => 'form-horizontal form-signin-signup',
														'url' => array('controller' => 'Home',
														'action' => 'index')));?>
						<?php echo $this->Form->input('user_name',array('label' => false,
																			'placeholder' => 'User Name',		
																		   'type' => 'text')); ?>
						
						<?php echo $this->Form->input('company_name',array('label' => false,
																			'placeholder' => 'Name of Company',
																		   'type' => 'text')); ?>
						
					
					
						<?php echo $this->Form->input('user_role',array('label' => false,
																		'type' => 'text',
																			'placeholder' => 'Choose Designation',
																		   'options' => $user_role)); ?>
						
					
					
						<?php echo $this->Form->input('input_email',array('label' => false,
																			'placeholder' => 'Email',
																		   'type' => 'text')); ?>
						
					
					
						<?php echo $this->Form->input('input_password',array('label' => false,
																			'placeholder' => 'Password',
																				'type' => 'password')); ?>
						
					
					
						<?php echo $this->Form->input('confirm_password',array('label' => false,
																			'placeholder' => 'Confirm Password',
																				'type' => 'password')); ?>
						
					
						<?php echo $this->Form->input('created',array('type' => 'hidden', 'value' => "CakeTime::format('Y-m-d H:i:s', time())")); ?>
						<?php echo $this->Form->input('modified',array('type' => 'hidden', 'value' => "CakeTime::format('Y-m-d H:i:s', time())")); ?>
					
						
						<?php echo $this->Form->submit('Sign Up',array('class' => 'btn btn-primary btn-large bottom-space')); ?>
					
					
					<?php echo $this->Form->end();?>
				
                	<h4><i class="icon-question-sign"></i> Already have an account?</h4>
                <a href="<?php $this->Html->url(array('controller' => 'Home', 'action' => 'signIn')); ?>" class="btn btn-large bottom-space">Signin</a>
                </div>
            </div>
		</div>
	</div>
</div>










