<?php
/** @var $listCat array
 * @var $catCurrent array
 * @var $this ProductController
 */
$listCatChild = Category::model()->getOptionByParent($catCurrent);
?>

<div class="vote_product">
    <div class="main-title">BÌNH CHỌN SẢN PHẨM</div>
    <div class="tab-vote-product tab-custom" id="product-session">
        <ul class="nav nav-tabs" role="tablist">
            <?php foreach ($listCat as $cat => $nameCat): ?>
            <li role="presentation" class="<?php echo ($cat==$catCurrent ? 'active' : '') ?>">
                <a href="?cat=<?php echo $cat ?>&auto_scroll=product-session"><?php echo $nameCat ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active">

            <div class="tab-level tab-custom">
                <ul class="nav nav-tabs" role="tablist">
                    <?php $classFirst = 'active' ?>
                    <?php foreach ($listCatChild as $catChild => $nameCatChild): ?>
                    <li role="presentation" class="<?php echo $classFirst ?>"><a href="#<?php echo $catChild ?>" aria-controls="<?php echo $catChild ?>" role="tab" data-toggle="tab"><?php echo $nameCatChild ?></a></li>
                    <?php $classFirst = '' ?>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="tab-content">
	            <?php $classFirst = 'active' ?>
	            <?php foreach ($listCatChild as $catChild => $nameCatChild): ?>
                <div role="tabpanel" class="tab-pane <?php echo $classFirst ?>" id="<?php echo $catChild ?>">
	                <?php
                    $criteria=new CDbCriteria(array(
                        'condition'=>'status='.Product::STATUS_PUBLISHED.' and category='.$catChild,
                        'order'=>'update_time DESC',
                    ));

                    $dataProvider=new CActiveDataProvider('Product', array(
                        'pagination'=>array(
                            'pageSize'=>Yii::app()->params['postsPerPage'],
                        ),
                        'criteria'=>$criteria,
                    ));

                    $this->widget('zii.widgets.CListView', array(
		                'dataProvider'=>$dataProvider,
		                'itemView'=>'_productItem',
		                'template'=>"{items}\n{pager}",
	                ));
                    ?>
                </div>
                <?php $classFirst = '' ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>