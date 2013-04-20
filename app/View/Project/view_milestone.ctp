<div class="row-fluid">
	<div class="span7 well">
		<?php 
			foreach($milestones as $milestone){
				echo $milestone['Milestone']['title'];
				echo '<br/>';
				echo $milestone['Milestone']['description'];
				echo '<br/>';
				echo $milestone['Milestone']['due_date'];
				echo '<br/>';
		
		?>
		<br/>
		<div class="well">
		<?php 
			echo $this->element('comments/index', array('model' => 'Milestone', 'foreignKey' => $milestone['Milestone']['id']));
		?>
		</div>
		<?php } ?>
	</div>
	
</div>