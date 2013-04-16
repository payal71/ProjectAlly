<?php
$divId = 'comment_add_'.$_model.'_'.$_foreignKey;
?>
<div id="<?php echo $divId ?>">
<?php 
$this->Session->flash();
?>
<?php
/*if ( !empty($successful) ) {
	echo $this->Js->writeBuffer($this->Ajax->remoteFunction(array(
		'url' => '/comments/index/'.$_model.'/'.$_foreignKey,
		'update' => 'comments_'.$_model.'_'.$_foreignKey,
	)));
}*/
?>
<div class="comments form">
<?php echo $this->Form->create('Comment', array('model' => 'Commentz', 'update' => $divId));?>
	<fieldset>
 		<legend><?php __('Add Comment');?></legend>
	<?php
		echo $this->Form->input('model', array('type' => 'hidden'));
		echo $this->Form->input('foreign_key', array('type' => 'hidden'));
		echo $this->Form->input('comment');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
</div>