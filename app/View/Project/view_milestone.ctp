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
				
			}
		?>
	</div>
</div>