<?php
$topPosts = Post::model()->findAll(new CDbCriteria(array(
	'condition'=>'status='.Post::STATUS_PUBLISHED,
	'order'=>'update_time DESC',
	'limit' => 3
)));

if ( count($topPosts) == 3):
?>
<div class="block-product-three">
	<div class="left-big">
		<div class="block-image">
			<?php echo CHtml::image(Helper::getPathUpload() . $topPosts[0]->thumnail, $topPosts[0]->title)?>
			<?php echo CHtml::link(CHtml::encode($topPosts[0]->title), $topPosts[0]->url, array('class' => 'title')); ?>
			<div class="description"><?php echo Helper::cutText($topPosts[0]->content, 200) ?></div>
		</div>
	</div>
	<div class="right-small">
		<div class="block-two-image-small">
			<div class="block-image">
				<?php echo CHtml::image(Helper::getPathUpload() . $topPosts[1]->thumnail, $topPosts[1]->title)?>
				<?php echo CHtml::link(CHtml::encode($topPosts[1]->title), $topPosts[1]->url, array('class' => 'title')); ?>

			</div>
			<div class="block-image">
				<?php echo CHtml::image(Helper::getPathUpload() . $topPosts[2]->thumnail, $topPosts[2]->title)?>
				<?php echo CHtml::link(CHtml::encode($topPosts[2]->title), $topPosts[2]->url, array('class' => 'title')); ?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>