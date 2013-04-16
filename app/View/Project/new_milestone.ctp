<?php
    echo $this->Html->script('bootstrap-datetimepicker.js');
    echo $this->Html->css('bootstrap-datetimepicker.min.css');
?>
<div class="row-fluid">
    <div class="span12">
        <!-- Main content -->
        <!-- form using cakephp -->
        <div class="span5 well">
            <legend>Add New Milestone</legend>
                <?php
                echo $this->Form->create('Milestone',array('class' => 'form-horizontal', 'url' => array('controller' => 'Project',
                                                                                                           'action' => 'newMilestone', $projectid)));
                echo $this->Form->input('title');
                ?>

                <div id="datetimepicker1" class="input-append date">
                        <label>Due Date</label>
                        <input data-format="yyyy/MM/dd hh:mm:ss" type="text" id="data[Milestone][due_date]" name="data[Milestone][due_date]"></input>
                         <span class="add-on">
                          <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                          </i>
                        </span>
                            <script type="text/javascript">
                                $(function() {
                                    $('#datetimepicker1').datetimepicker({
                                        language: 'en',
                                        pick24HourFormat: true
                                    });
                                });
                            </script>
                </div>
                <?php
                        echo $this->Form->input('responsible_user',array(
                             'options' => $responsibleuser,
                             'empty' => '--- Select an user ---'));

                        echo $this->Form->input('planner',array(
                             'options' => array('none')));

                        echo "<span>Description</span><br/>";
                        echo $this->Form->textarea('description');
                        echo $this->Form->input('project_id',array('label'=>false,
										                            'type' => 'hidden',
										                            'value' => $projectid
                        											));
                        echo $this->Form->submit('Create Milestone',array('class' => 'btn'));
                        echo $this->Form->end();
                ?>
        </div>
    </div>
</div>
