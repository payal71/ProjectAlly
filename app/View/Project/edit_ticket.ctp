<div class="row-fluid">
    <div class="span12">
        <!-- Main content -->
        <!-- form using cakephp -->
        <div class="span8 well">
        <?php foreach ($tickets as $ticket){ ?>
            <legend>Edit Ticket</legend>
            <?php
                echo $this->Form->create('Ticket',array('class' => 'form-horizontal',
									                    'url' => array('controller' => 'Project',
									                                   'action' => 'editTicket', $ticket['BugAndFeature']['id'], $projectid)));
            	echo $this->Form->input('id', array('type' => 'hidden', 'value' => $ticket['BugAndFeature']['id']))
            ?>
            <table>
                <tr>
                    <td><label>Title</label></td>
                    <td>
                        <?php
                            echo $this->Form->input('title',array('label'=>false, 'value' => $ticket['BugAndFeature']['title']));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><label>Description</label></td>
                    <td><?php echo $this->Form->textarea('description',array('label'=>false, 'value' => $ticket['BugAndFeature']['description'])); ?></td>
                </tr>
                <?php $reportedby = $this->Session->read('name'); ?>
                <?php $id_reportedby = $this->Session->read('id'); ?>
                <tr>
                    <td><label>Reported By</label></td>
                    <td>
                        <?php
                            echo $this->Form->input('Reported By',array('label' => false,
										                                'readonly' => 'readonly',
										                                'value' => $reportedby
										                            	));
                            echo $this->Form->input('reported_by',array('label' => false,
                                                                        'type' => 'hidden',
                                                                        'readonly' => 'readonly',
                                                                        'value' => $id_reportedby
                                                                        ));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><label>Status</label></td>
                    <td>
                        <?php
                            echo $this->Form->input('status',array( 'label'=>false,
									                                'readonly' => 'readonly',
									                                'options' => array('3' => 'new'),
                            										'value' => $ticket['BugAndFeature']['status']
									                            ));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><label>Priority</label></td>
                    <td>
                        <?php
                            echo $this->Form->input('priority_id',array('label'=>false,
									                                 'options' => $priority,
                            										 'value' => $ticket['BugAndFeature']['priority_id']	
									                                 ));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><label>Assigned To</label></td>
                    <td>
                        <?php
                            echo $this->Form->input('assigned_to',array('label'=>false,
										                                'options' => $assignedto, 
                            											'value' => $ticket['BugAndFeature']['assigned_to']
										                            	));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><label>Milestone</label></td>
                    <td>
                        <?php
                            echo $this->Form->input('milestone_id',array('label'=>false,
									                                'options' => $milestone,
									                                'value' => $ticket['BugAndFeature']['milestone_id']
									                            	));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><label>Estimate</label></td>
                    <td><?php
                            echo $this->Form->input('estimate',array('label'=>false,
									                                'options' => $estimate,
									                                'value' => $ticket['BugAndFeature']['estimate']
									                            	));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php
                        echo $this->Form->input('project_id',array('label'=>false,
                            'type' => 'hidden',
                            'value' => $projectid
                        ));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $this->Form->submit('Save Changes',array('class' => 'btn')); ?></td>
                    <td></td>
                </tr>
            </table>
            <?php
                echo $this->Form->end();
            ?>
            <?php } ?>
        </div>
    </div>
</div>