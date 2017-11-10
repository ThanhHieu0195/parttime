<?php /** @var \Product $data */ ?>
<div class="product">
    <div class="block block-left">
        <?php echo CHtml::image($data->getUrlThumnail(Helper::getThumnailDefault()), $data->title) ?>
    </div>
    <div class="block block-right">
        <div class="title">
		    <?php echo CHtml::link(CHtml::encode($data->title), $data->url); ?>
        </div>
        <div class="author">
            posted by <?php echo $data->author->username . ' on ' . date('F j, Y',$data->create_time); ?>
        </div>
        <div class="content">
		    <?php
		    $this->beginWidget('CMarkdown', array('purifyOutput'=>true));
		    echo $data->content;
		    $this->endWidget();
		    ?>
        </div>
    </div>
</div>

<style>
    .block-left img {
        height:150px;
        border: 3px solid #d5d5d5;
    }

    .block {
        display: inline-block;
    }
</style>

