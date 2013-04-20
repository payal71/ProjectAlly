<?php
$role = $this->Session->read('role');
?>
<div class="row-fluid">
	<div class="span12">
    <div class="span2">
        <?php
        if ($role==1 || $role==2)
        {
            echo $this->Html->link('New Ticket',
                array('controller' => 'Project', 'action' => 'newTicket', $projectid),
                array('class' => 'btn'));
        }
        ?>
    </div>

    <div class="span8">
    <?php
        foreach($milestones as $milestone){
            ?>
            <h3><strong>
            <?php  
            echo $this->Html->link($milestone['Milestone']['title'], array('controller' => 'Project', 
               															   'action' => 'viewMilestone', $milestone['Milestone']['id'])); 
            ?>
            </strong></h3>
            <br/>
            <table class="table table-bordered">
            	<thead>
        			<tr>
	        			<th>Ticket id</th>
	        			<th>Title</th>
	        			<th>Assigned to</th>
	        			<th>Status</th>
	        			<th></th>
	        			<th></th>
                        <th></th>
        			</tr>
        		</thead>
        	<?php
            foreach($tickets as $ticket){
            	if($milestone['Milestone']['id']==$ticket['BugAndFeature']['milestone_id']){
        	?>
        			<tr>
                        <td>
                            <?php echo $ticket['BugAndFeature']['id']; ?>
                        </td>
                        <td>
                        	<?php
                             echo $this->Html->link($ticket['BugAndFeature']['title'], array('controller' => 'Project', 'action' => 'viewTicket', $ticket['BugAndFeature']['id']));
                        	?>
                        </td>
                        <td>
                            <a href="#"><?php echo $assignedto[$ticket['BugAndFeature']['assigned_to']]; ?></a>
                        </td>
                        <td>
                            <?php echo $status[$ticket['BugAndFeature']['status']]; ?>
                        </td>
						<td class="actions">
							<a href="<?php echo $this->Html->url(array('action' => 'editTicket', $ticket['BugAndFeature']['id'], $projectid)); ?>"><i class="icon-edit"></i> <strong>Edit</strong></a>
						</td>
			            <td class="actions">
							<a href="<?php echo $this->Html->url(array('action' => 'deleteTicket', $ticket['BugAndFeature']['id'], $projectid));?>"><i class="icon-remove"></i> <strong>Delete</strong></a>
				        </td>
                        <!--dropdown start-->
                        <td>
                            <div class="btn-group">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                    Action
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- dropdown menu links -->
                                    <li><a>abc</a></li>
                                    <li><a>xyz</a></li>
                                </ul>
                            </div>
                        </td>
                        <!--dropdown end-->
                    </tr>
				<!--         <div class="row">-->
<!--	                <div class="span7">-->
<!--	                    <h4><strong><a href="#">--><?php //echo $ticket['BugAndFeature']['title']; ?><!--</a></strong></h4>-->
<!--	                </div>-->
<!--	                <div class="span2">-->
<!--						<div class="btn-group">-->
<!--	                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">-->
<!--	                            Action-->
<!--	                            <span class="caret"></span>-->
<!--	                        </a>-->
<!--	                        <ul class="dropdown-menu">-->
<!--	                            <li>-->
<!--		                            --><?php //
//		                            echo $this->Html->link('Attach Files', array('controller' => 'Project', 'action' => 'attachFiles', $ticket['BugAndFeature']['id']));
//				     				?>
<!--								</li>-->
<!--	                            <li><a tabindex="-1" href="#">Mark as Completed</a></li>-->
<!--	                            <li class="divider"></li>-->
<!--	                            <li><a tabindex="-1" href="#">Delete</a></li>-->
<!--	                        </ul>-->
<!--	                    </div>-->
<!--	                </div>-->
<!--            	</div>-->
<!--	            <div class="row">-->
<!--	                <div class="span8">-->
<!--	                    <p>-->
<!--	                        --><?php //echo $ticket['BugAndFeature']['description']; ?>
<!--	                    </p>-->
<!--	                </div>-->
<!--	            </div>-->
<!--	            <div class="row">-->
<!--	                <div class="span8">-->
<!--	                    <p></p>-->
<!--	                    <p>-->
<!--	                        --><?php
//	                        foreach($users as $user){
//	                            if($user['Profile']['id'] == $ticket['BugAndFeature']['reported_by']){?>
<!--	                                <i class="icon-user"></i> <b>Reported By: </b><a href="">--><?php //echo $user['Profile']['user_name']?><!--</a>-->
<!--	                                --><?php
//	                            }
//	                        }
//	                        echo "|";
//	                        foreach($users as $user){
//	                            if($user['Profile']['id'] == $ticket['BugAndFeature']['assigned_to']){?>
<!--	                                <i class="icon-user"></i> <b>Assigned To: </b><a href="">--><?php //echo $user['Profile']['user_name']?><!--</a>-->
<!--	                                --><?php
//	                            }
//	                        }
//	                        ?>
<!--	                    </p>-->
<!--	                    -->
<!--	                    <hr>-->
<!--	                </div>-->
<!--	            </div>-->
<!--        --><?php
           	}
       	}?>
            </table>
        <?php
    	}
//   		?>
		</div>
    </div>
</div>
