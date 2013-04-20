<div class="container">
	<div class="page-header">
    	<h1>Signin to ProjectAlly</h1>
    </div>
    <div class="row">
    	<div class="span6 offset3">
        	<h4 class="widget-header"><i class="icon-lock"></i> Signin to Project<span style="color: #52a8ec"><strong>Ally</strong></span></h4>
            <div class="widget-body">
            	<div class="center-align">
      				<!-- LOGIN FORM -->
				  	<?php 
					echo $this->Form->create('UserInfo',array('class' => 'form-horizontal form-signin-signup',
												'url' => array('controller' => 'Home',
													'action' => 'authenticate')));
					echo $this->Form->input('input_email',array('label' => false,
																	'placeholder' => 'Email',
																	));
					echo $this->Form->input('input_password',array('label' => false,
																  'placeholder' => 'Password',
																  'type' => 'password',
																  ));
					?>
					<div class="remember-me">
	                    <div class="pull-left">
	      	                <label class="checkbox">
	        	            	<input type="checkbox"> Remember me
	            	        </label>
	                    </div>
	                    <div class="pull-right">
	                		<a href="#">Forgot password?</a>
	                    </div>
                    	<div class="clearfix"></div>
                  	</div>
                  <?php 
                  echo $this->Form->submit('Login',array('class' => 'btn btn-primary btn-large bottom-space'));
						echo $this->Form->end();
					?>		
                
                	<h4><i class="icon-question-sign"></i> Don't have an account?</h4>
               		<a href="<?php $this->Html->url(array('controller' => 'Home', 'action' => 'signUp')); ?>" class="btn btn-large bottom-space">Signup</a>
                </div>
            </div>
		</div>
	</div>
</div>







