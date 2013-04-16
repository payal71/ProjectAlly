<?php 
$divId = 'comments_'.$_model.'_'.$_foreignKey;
?>
<div id="<?php echo $divId; ?>">
<a name="<?php echo $divId; ?>"></a>
<?php
$this->Paginator->options(array(
	'update' => $divId,
	'url' => $this->params['pass'], 
));
?>
<h3><?php __('Comments');?></h3>
<?php if ( empty($comments) ) : ?>
	<em>No Comments Posted</em>
<?php endif; ?>
<ol class="comment-list">
	<?php foreach ($comments as $comment): ?>
  	<li>
		<div id="comment<?php echo $comment['Comment']['id']; ?>" class="comment">
			<div class="posted-by">
				<strong>
				<?php if ( empty($comment['Creator']['id']) ): ?>
					<em>Anonymous</em>
				<?php else: ?>
					<?php echo $comment['Creator']['name']; ?>
				<?php endif; ?>
				said on <em><?php echo $this->Time->timeAgoInWords($comment['Comment']['created']); ?></em>:</strong>
			</div>
			<?php echo nl2br($comment['Comment']['comment']); ?>
		</div>
	</li>
	<?php endforeach; ?>
</ol>
<div style="clear: both;"></div>
<div class="paging">
	<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
	<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<?php
echo $this->requestAction('/comments/add/'.$_model.'/'.$_foreignKey, array('return'));
?>
</div>