<?php
    $act = $this->request->params['action'];
    $cont = $this->request->params['controller'];
	$role = $this->Session->read('role');
    $name = $this->Session->read('name');
?>
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
	    <div class="container">
	    <a href="index.html" class="brand brand-bootbus">Project<span style="color: #52a8ec"><strong>Ally</strong></span></a>
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
	    <div class="nav-collapse collapse">        
		    <ul class="nav pull-right">
		        <li class="<?php if($act == 'HomePage'){ echo "active"; }?>">
		            <?php echo $this->Html->link('Home', array('controller' => 'Home', 'action' => 'index'))?>
		        </li>
		        <li class="<?php if($act == 'aboutUs'){ echo "active"; }?>">
		            <?php echo $this->Html->link('About Us', array('controller' => 'Home', 'action' => 'aboutUs'))?>
		        </li>
		        <?php
		        //php code to check whether the user is logged in or not
		        if(isset($name)) {
		            //below links will be showed only if the user is logged in
		            ?>
					<li class="<?php if($cont == 'Project'){ echo "active"; }?>">
			            <?php echo $this->Html->link('Project Management', array('controller' => 'Project', 'action' => 'listProject'))?>
			        </li>
		        
		            <li class="<?php if($cont == 'Employee'){ echo "active"; }?>">
		                <?php echo $this->Html->link('Employee Management', array('controller' => 'Employee', 'action' => 'index'))?>
		            </li>
					<li class="<?php if($cont == 'Calendar'){ echo "active"; }?>">
			            <?php echo $this->Html->link('Calendar', array('controller' => 'Calendar', 'action' => 'index'))?>
			        </li>
		        	<li>
		            <?php
		            //Following code is to notify number of pending users to superadmin.
		             ?>   <ul class="nav nav-pills">
		                    <?php if ($role == 1)
		                {?>
		                    <?php }
		                    //code ends here
		                    ?>
		                    <!-- Code for logout and myprofile -->
		                    <li class="dropdown">
		                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
		                            <?php echo $name; ?>
		                            <b class="caret"></b>
		                        </a>
		                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
		                            <li><?php echo $this->Html->link('My Profile', array('controller' => 'Employee', 'action' => 'userProfile')); ?></li>
		                            <li class="divider"></li>
		                            <li><?php echo $this->Html->link('Logout', array('controller' => 'App', 'action' => 'logout')); ?></li>
		                        </ul>
		                    </li>
		                	<li>
		                        <?php
		                        echo $this->Html->link($notify, array('controller' => 'Employee', 'action' => 'pendingUsers'),array('class' => 'badge badge-important'));
		                        ?>
		                    </li>
		                </ul>
		          </li>
				<?php 
		        } 
		        else{
		        ?>	
	                <li class="<?php if($act == 'signIn'){ echo "active"; }?>">
			            <?php echo $this->Html->link('Sign in', array('controller' => 'Home', 'action' => 'signIn'))?>
			        </li>
			        <li class="<?php if($cont == 'SignUp'){ echo "active"; }?>">
				        <?php echo $this->Html->link('Sign up', array('controller' => 'Home', 'action' => 'signUp'))?>
				    </li>
		        <?php 
		        }
		        ?>
		     	</ul>
	    	</div>
		</div><!-- /CONTAINER -->
	</div>
</div>
