<?php
/**
 * @var \CActiveForm $form
 * @var \PostController $this
 */

?>
    <div class="form form-create">
    <div class="form-toggle"></div>
    <div class="form-panel one">
        <div class="form form-post" id="form-post">

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

            <div class="row">
                <?php echo $form->labelEx($model,'thumnail', array('for' => 'uploadfile')); ?>
                <?php
                $urlThumnail = $model->getUrlThumnail();
                if (empty($urlThumnail)) {
                    $urlThumnail = Helper::getThumnailDefault();
                }
                echo CHtml::tag('label', array('id' => 'thumnail-block', 'for' => 'uploadfile'), CHtml::image($urlThumnail, 'thumnail'));
                ?>
                <?php echo CHtml::fileField('Post[uploadfile]', '', array('id' => 'uploadfile', 'class' => 'hidden')); ?>
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

            <?php $this->endWidget(); ?>

        </div><!-- form -->
    </div>
    <div class="form-panel two">
    </div>
    <style>
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
<?php
Yii::app()->clientScript->registerScript("get-option", "
    $('#uploadfile').on('change', function(){
        var file = $(this)[0].files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadend = function () {
            var imgURL = reader.result;
            $('#Post_thumnail').val(imgURL);
            $('#thumnail-block img').attr('src',imgURL);
        }
    });  
");

