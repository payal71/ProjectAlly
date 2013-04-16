<div class="row-fluid">
    <div class="span12">
        <!-- Main content -->
        <!-- form using cakephp -->
        <div class="span8 well">
            <legend>Add New Ticket</legend>
            <?php
                echo $this->Form->create('Ticket',array('class' => 'form-horizontal',
									                    'url' => array('controller' => 'Project',
									                                   'action' => 'newTicket', $projectid)));
            ?>
            <table>
                <tr>
                    <td><label>Title</label></td>
                    <td>
                        <?php
                            echo $this->Form->input('title',array('label'=>false));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><label>Description</label></td>
                    <td><?php echo $this->Form->textarea('description',array('label'=>false)); ?></td>
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
									                                'options' => array('3' => 'new')
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
									                                 'empty' => '===  Select priority of the bug ==='
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
										                                'empty' => '=== Select reponsible user  ==='
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
									                                'empty' => '=== Select a milestone  ==='
									                            	));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><label>Estimate</label></td>
                    <td><?php
                            echo $this->Form->input('estimate',array('label'=>false,
									                                'options' => $estimate,
									                                'empty' => '=== Select a estimated size  ==='
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
                    <td><?php echo $this->Form->submit('Create Ticket',array('class' => 'btn')); ?></td>
                    <td></td>
                </tr>
            </table>
            <?php
                echo $this->Form->end();
            ?>
        </div>
    </div>
</div>