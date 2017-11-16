<?php
/**
 * @var \CActiveForm $form
 * @var \PostController $this
 */
?>
    <div class="form form-create">
        <div class="form-toggle"></div>
        <div class="form-panel one">
            <div class="form" id="form-product">

                <?php $form=$this->beginWidget('CActiveForm'); ?>

                <p class="note">Fields with <span class="required">*</span> are required.</p>

                <?php echo CHtml::errorSummary($model); ?>

                <div class="row">
                    <?php echo $form->labelEx($model,'title'); ?>
                    <?php echo $form->textField($model,'title',array('size'=>80,'maxlength'=>128)); ?>
                    <?php echo $form->error($model,'title'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model,'content'); ?>
                    <?php echo CHtml::activeTextArea($model,'content',array('rows'=>10, 'cols'=>70)); ?>
                    <p class="hint">You may use <a target="_blank" href="http://daringfireball.net/projects/markdown/syntax">Markdown syntax</a>.</p>
                    <?php echo $form->error($model,'content'); ?>
                </div>

                <div class="row" id="field-type">
                    <?php echo CHtml::label('Type', 'type'); ?>
                    <?php
                    $types = Category::model()->getOptionByParent();
                    $typleselected = key($types);
                    if (isset($model->category) && $model->category) {
                        $typleselected = Category::model()->getType($model->category);
                    }
                    if (isset($types) && !empty($types)) {
                        echo CHtml::dropDownList('type', $typleselected, $types);
                    }
                    ?>
                </div>

                <div class="row" id="field-cat">
                    <?php echo $form->labelEx($model,'category'); ?>
                    <?php
                    $categories = Category::model()->getOptionByParent($typleselected);
                    if (isset($categories) && !empty($categories)) {
                        echo $form->dropDownList($model, 'category', $categories);
                    }
                    ?>
                    <?php echo $form->error($model,'category'); ?>
                </div>

                <div class="row" id="field-config">
                    <?php echo $form->labelEx($model,'Configs'); ?>
                    <table>
                        <tr><th>Key</th><th>Value</th><th></th></tr>
                        <?php
                        if (isset($model->config) && $model->config) {
                            $configs = json_decode($model->config, true);
                            $keys = $configs['key'];
                            $vals = $configs['value'];
                            for ($i=0; $i<count($keys); $i++) {
                                if ($keys[$i] ) {
                                    $this->renderPartial('config-field/row', array('key' => $keys[$i], 'value' => $vals[$i]));
                                }
                            }
                        }
                        ?>
                        <?php $this->renderPartial('config-field/row') ?>
                    </table>
                    <?php echo CHtml::button('Add Row', array('id' => 'add-field-config')) ?>
                    <?php echo $form->error($model,'config'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model,'thumnail', array('for' => 'uploadfile')); ?>
                    <?php
                    $urlThumnail = $model->getUrlThumnail();
                    if (empty($urlThumnail)) {
                        $urlThumnail = Helper::getThumnailDefault();
                    }
                    echo CHtml::tag('label', array('id' => 'thumnail-block', 'for' => 'uploadfile'), CHtml::image($urlThumnail, 'thumnail'));
                    ?>
                    <?php echo CHtml::fileField('Product[uploadfile]', '', array('id' => 'uploadfile', 'class' => 'hidden')); ?>
                    <?php echo $form->hiddenField($model, 'thumnail'); ?>
                    <?php echo $form->error($model,'thumnail'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model,'status'); ?>
                    <?php echo $form->dropDownList($model,'status',Lookup::items('PostStatus')); ?>
                    <?php echo $form->error($model,'status'); ?>
                </div>
                <div class="row buttons">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
                </div>
                <?php  ?>
                <?php $this->endWidget(); ?>
                <style>
                    #field-config table {
                        width: 50%;
                    }
                    #field-config table tr.item:not(:first-child) .btn-remove{
                        position: relative;
                    }
                    #field-config table tr.item:not(:first-child) .btn-remove:hover:after {
                        color: #ff0000;
                    }
                    #field-config table tr.item:not(:first-child) .btn-remove:after {
                        content: 'x';
                        background: black;
                        color: white;
                        border-radius: 50%;
                        padding: 2px 6px;
                    }

                    #thumnail-block {
                        display: inline-block;
                        border: 3px solid #d5d5d5;
                    }

                    #thumnail-block:hover {
                        border-color: #0c97ed;
                    }
                    #thumnail-block img {
                        max-height: 200px;
                    }

                    .hidden {
                        display: none;
                    }
                </style>
            </div><!-- form -->
        </div>
        <div class="form-panel two">
    </div>
<?php
Yii::app()->clientScript->registerScript("get-option", "
    $('#form-product #field-type select').on('change', function (object) {
        var id = $(this).val();
        var data = {action:'get_option', id:id};
        $.post('ajax', data, function (res) {
            $('#field-cat select').replaceWith(res);
        })
    });
    $('#add-field-config').on('click', function(){
        var row = $('#field-config table tr:last-child').clone();
        row.find('input').val('');
        $('#field-config table').append(row); 
    });
    $('#uploadfile').on('change', function(){
        var file = $(this)[0].files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadend = function () {
            var imgURL = reader.result;
            $('#Product_thumnail').val(imgURL);
            $('#thumnail-block img').attr('src',imgURL);
        }
    });  
    
    $('#field-config tr.item .btn-remove').on('click', function(){
         $(this).parents('tr.item').remove();
    });  
");
?>