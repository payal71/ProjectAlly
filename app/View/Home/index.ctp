<?php 
	echo $this->Html->script('jquery.validate.js');
	echo $this->Html->script('validate.js');
	echo $this->Html->script('unload.js');
	echo $this->Html->css('jquery.validate.css');
?>
		<div class="row-fluid">
			<div class="span6">
				<!-- LOGIN FORM -->
				  	<?php 
					echo $this->Form->create('UserInfo',array('class' => 'form-horizontal',
												'url' => array('controller' => 'Home',
													'action' => 'authenticate')));
					?>
					<legend> Log in to Project<span style="color: #52a8ec"><strong>Ally</strong></span></legend>
					<?php 
					echo "<div class=\"control-group\">";
						echo $this->Form->label('input_email', 'Email', array('class' => 'control-label'));
						echo $this->Form->input('input_email',array('label' => false,
																	'placeholder' => 'Email',
																	'div' => array(
																		'class' => 'controls'
																		)
																	));
					echo "</div>";
					echo "<div class=\"control-group\">";
						echo $this->Form->label('input_password', 'Password', array('class' => 'control-label'));
						echo $this->Form->input('input_password',array('label' => false,
																  'placeholder' => 'Password',
																  'type' => 'password',
																  'div' => array(
																	'class' => 'controls'
																	)
																   ));
					echo "</div>";
					echo "<div class=\"control-group\">";
					echo "<div class=\"controls\">";
					?>
					<label class="checkbox">
					<?php 
					echo $this->Form->checkbox('Remember me',array('label' => false));
						//echo " Remember me";	
					echo "Remember Me </label>";
						echo $this->Form->submit('Login',array('class' => 'btn'));
						echo $this->Form->end();
					echo "</div>";
					echo "</div>";
					?>		
			</div>
			<div class="span6">
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
				
					<?php echo $this->Form->create('Profile',array('class' => 'AdvancedForm',
														'url' => array('controller' => 'Home',
														'action' => 'index')));?>
						<legend> Register with Project<span style="color: #52a8ec"><strong>Ally</strong></span></legend>
					<table>
					<tr>
						<td align="right">Name</td>
						<td><?php echo $this->Form->input('user_name',array('label' => false,
																		   'type' => 'text')); ?>
						</td>
					</tr>
					<tr>
						<td align="right">Company</td>
						<td><?php echo $this->Form->input('company_name',array('label' => false,
																		   'type' => 'text')); ?>
						</td>
					</tr>
					<tr>
						<td align="right">Designation</td>
						<td><?php echo $this->Form->input('user_role',array('label' => false,
																		   'options' => $user_role)); ?>
						</td>
					</tr>
					<tr>
						<td align="right">Email</td>
						<td><?php echo $this->Form->input('input_email',array('label' => false,
																		   'type' => 'text')); ?>
						</td>
					</tr>
					<tr>
						<td align="right">Password</td>
						<td><?php echo $this->Form->input('input_password',array('label' => false,
																				'type' => 'password')); ?>
						</td>
					</tr>
					<tr>
						<td align="right">Confirm Password</td>
						<td><?php echo $this->Form->input('confirm_password',array('label' => false,
																				'type' => 'password')); ?>
						</td>
					</tr>
						<?php echo $this->Form->input('created',array('type' => 'hidden', 'value' => "CakeTime::format('Y-m-d H:i:s', time())")); ?>
						<?php echo $this->Form->input('modified',array('type' => 'hidden', 'value' => "CakeTime::format('Y-m-d H:i:s', time())")); ?>
					<tr>
						<td></td>
						<td><?php echo $this->Form->submit('Sign Up',array('class' => 'btn')); ?></td>
					</tr>
					
					<?php echo $this->Form->end();?>
				</table>
				
					
					<?php 
					
					//at present model name isn't specified....it will be specified as per
					//requirement.
					/*echo $this->Form->create('',array('class' => 'form-horizontal'));
					echo "<div class=\"control-group\">";
						echo $this->Form->label('input_email', 'Email', array('class' => 'control-label'));
						echo $this->Form->input('input_email',$options);
					echo "</div>";
					echo "<div class=\"control-group\">";
						echo $this->Form->label('input_password', 'Password', array('class' => 'control-label'));
						echo $this->Form->input('input_password',array('label' => false,
																  'placeholder' => 'Password',
																  'type' => 'password',
																  'div' => array(
																	'class' => 'controls'
																	)
																   ));
					echo "</div>";
					echo "<div class=\"control-group\">";
					echo "<div class=\"controls\">";
						//echo $this->Form->label(null,'Remember me',array('class' => 'checkbox'));
					?>
					<label class="checkbox">
					<?php 
					echo $this->Form->checkbox('Remember me',array('label' => false));
						//echo " Remember me";	
					echo "Remember Me </label>";
						echo $this->Form->submit('Login',array('class' => 'btn'));
						echo $this->Form->end();
					echo "</div>";
					echo "</div>";*/
				?>
				
				
				<!-- Form is commented and kept for reference -->
				<!-- 
				<form class="form-horizontal">
				  <div class="control-group">
				    <label class="control-label" for="input_email">Email</label>
				    <div class="controls">
				      <input type="text" id="input_email" placeholder="Email">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="input_password">Password</label>
				    <div class="controls">
				      <input type="password" id="input_password" placeholder="Password">
				    </div>
				  </div>
				  <div class="control-group">
				    <div class="controls">
				      <label class="checkbox">
				        <input type="checkbox"> Remember me
				      </label>
				      <button type="submit" class="btn">Sign in</button>
				    </div>
				  </div>
				</form>
				 -->
			</div>
		</div>