<?php 
	
	echo $this->Html->script('jquery-1.8.0.min.js');
	echo $this->Html->script('jquery-ui-1.8.23.custom.min.js');
	echo $this->Html->css('jquery-ui-1.8.23.custom.css');
	
?>
		<div class="row-fluid">
			<div class="span12">
				<!-- Main content -->
				<?php
					//file used View/Element/view_member.ctp 					
					echo $this->element('view_members'); 
				?>
			</div>
		</div>
