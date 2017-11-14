<div class="detail-product">
    <div class="block-content-product">
        <div class="block-image">
            <?php echo CHtml::image(Helper::getPathUpload() . $data->thumnail, $data->title) ?>
        </div>
        <div class="block-content">
            <?php echo CHtml::link(CHtml::encode($data->title), $data->url, array('class' => 'title')); ?>
            <div class="content">
                <?php
                $this->beginWidget('CMarkdown', array('purifyOutput'=>true));
                echo $data->content;
                $this->endWidget();
                ?>
            </div>
            <div class="nav">
                <?php echo CHtml::link('Permalink', $data->url); ?> |
                Last updated on <?php echo date('F j, Y',$data->update_time); ?>
            </div>
        </div>
    </div>
</div>
