<div class="row-fluid">
	<div class="span7 well">
		<?php 
			foreach($tickets as $ticket){
				echo $ticket['BugAndFeature']['title'];
				echo '<br/>';
				echo $ticket['BugAndFeature']['description'];
				echo '<br/>';
		
		?>
		<br/>
		<div class="well">
		<?php 
			echo $this->element('comments/index', array('model' => 'BugAndFeature', 'foreignKey' => $ticket['BugAndFeature']['id']));
		?>
		</div>
		<?php } ?>
	</div>
	
</div>