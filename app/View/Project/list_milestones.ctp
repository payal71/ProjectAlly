<?php
    $role = $this->Session->read('role');
?>
<div class="row-fluid">
    <div class="span12">
	    <div class="span2">
	        <?php
	            if ($role==1 || $role==2)
	            {
	                echo $this->Html->link('New Milestone', array('controller' => 'Project', 'action' => 'newMilestone', $projectid),
											                array('class' => 'btn'));
	            }
	        ?>
		</div>
		<div class="span8">
	 	<?php foreach($milestones as $milestone){ ?>
			<div class="row">
				<div class="span7">
					<h4><strong>
					<?php  
            		echo $this->Html->link($milestone['Milestone']['title'], array('controller' => 'Project', 
            																	  'action' => 'viewMilestone', $milestone['Milestone']['id'])); 
            		?>
            		</strong></h4>
				</div>
				<div class="span2">      
			     	<div class="btn-group">
						<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
					    Action
					    <span class="caret"></span>
					  	</a>
					  	<ul class="dropdown-menu">
						    <li><a tabindex="-1" href="#">Mark as Completed</a></li>
						    <li class="divider"></li>
							<li>
							<?php 
							echo $this->Html->link('Edit', array('controller' => 'Project', 
            													 'action' => 'editMilestone', $milestone['Milestone']['id'], $projectid)); 
            		
							?>
							</li>				  
							<li>
							<?php 
							echo $this->Html->link('Delete', array('controller' => 'Project', 
            													 'action' => 'deleteMilestone', $milestone['Milestone']['id'], $projectid)); 
            		
							?>
							</li>				  
					  	</ul>
					</div>			
				</div>
			</div>
			<div class="row">
				<div class="span8">      
			        <p>
				    	<?php 
				    	echo substr($milestone['Milestone']['description'], 0, 20);
				    	echo "...";
				    	?>
				    </p>
			    </div>
			</div>
		    <div class="row">
		    	<div class="span8">
			        <p></p>
			        <p>
			       	<?php 
			       	foreach($responsibleuser as $user){
			       		if($user['Profile']['id'] == $milestone['Milestone']['responsible_user']){?>
			        	<i class="icon-user"></i> <b>Responsible User: </b><a href=""><?php echo $user['Profile']['user_name']?></a>
			        <?php
						 } 
			       	}
					?>  	
			        | <i class="icon-calendar"></i> <b>Due date: </b> <?php
						echo $this->Time->format('F jS, Y', $milestone['Milestone']['due_date']); ?>	
			        | <i class="icon-eye-open"></i>
			        	<b>
			        	<a href="<?php echo $this->Html->url(array('controller' => 'Project', 'action' => 'listTickets', 'milestone' => $milestone['Milestone']['id'])); ?>" >View tickets</a></b>
					</p>
			        <hr>
	    	  	</div>
	   		 </div>
		<?php } ?>
		</div>
	</div>
</div>
