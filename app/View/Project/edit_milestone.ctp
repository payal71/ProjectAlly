<?php
    echo $this->Html->script('bootstrap-datetimepicker.js');
    echo $this->Html->css('bootstrap-datetimepicker.min.css');
?>
<div class="row-fluid">
    <div class="span12">
        <!-- Main content -->
        <!-- form using cakephp -->
        <div class="span5 well">
        	<?php foreach($milestones as $milestone){ ?>
            
            <legend>Edit Milestone</legend>
                <?php
                echo $this->Form->create('Milestone',array('class' => 'form-horizontal', 'url' => array('controller' => 'Project',
                                                                                                           'action' => 'editMilestone',$milestone['Milestone']['id'], $projectid)));
                echo $this->Form->input('id', array('type' => 'hidden', 'value' => $milestone['Milestone']['id']));
                
                echo $this->Form->input('title', array('value' => $milestone['Milestone']['title']));
                ?>

                <div id="datetimepicker1" class="input-append date">
                	<label>Due Date</label>
                    <input data-format="yyyy-MM-dd" type="text" id="data[Milestone][due_date]" value=<?php echo $milestone['Milestone']['due_date']; ?> name="data[Milestone][due_date]"></input>
                    <span class="add-on">
                    	<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                    </span>
                    <script type="text/javascript">
                                $(function() {
                                    $('#datetimepicker1').datetimepicker({
                                        language: 'en',
                                        pick24HourFormat: true,
                                        pickTime: false
                                    });
                                });
                    </script>
                </div>
                <?php
                        echo $this->Form->input('responsible_user',array('options' => $responsibleuser,
											                        	 'value' => $responsibleuser[$milestone['Milestone']['responsible_user']], 	
											                             ));

                        echo $this->Form->input('planner',array('options' => array('none'), 
									                             'value' => $milestone['Milestone']['planner'], 	
									                             ));

                        echo "<span>Description</span><br/>";
                        echo $this->Form->textarea('description', array('value' => $milestone['Milestone']['description'], 	
                            											'rows' => 10 ));
                        echo $this->Form->input('project_id',array('label'=>false,
										                            'type' => 'hidden',
										                            'value' => $projectid
                        											));
                        echo $this->Form->submit('Save Milestone',array('class' => 'btn'));
                        echo $this->Form->end();
        	}
            ?>
                
        </div>
    </div>
</div>
