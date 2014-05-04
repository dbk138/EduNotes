<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'artifact-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	
	<div class="row">
<table>
	<tr>
		<td><?php echo $form->labelEx($model,'category_id'); ?></td>
		<td><?php echo $form->labelEx($model,'subject_id'); ?></td>
		<td><?php echo $form->labelEx($model,'topic_id'); ?></td>
		
		
	</tr>
	<tr>
		<td>
		<?php echo $form->dropDownList($model,'category_id', 
									CHtml::listData(Category::model()->findAll(), 'id', 'category'), 
									array( 'prompt' => 'Select Category',
									'ajax' => array(
											'type' => 'POST',
											'url' => CController::createUrl('dynamicSubject'),
											'update' => '#'.CHtml::activeId($model,'subject_id')
											))); ?>
		<?php echo $form->error($model,'category_id'); ?>
		</td>
		<td>
		<?php echo $form->dropDownList($model,
									'subject_id', 
									//CHtml::listData(Subject::model()->findAll(), 'id', 'subject'), 
									array(), array('prompt'=>'Select Subject',
										'ajax' => array(
											'type' => 'POST',
											'url' => CController::createUrl('dynamicTopic'),
											'update' => '#'.CHtml::activeId($model,'topic_id')
											))); ?>
		<?php echo $form->error($model,'subject_id'); ?>
		</td>
		<td>
		<?php echo $form->dropDownList($model,
									'topic_id', 
									array(),
									//CHtml::listData(Topic::model()->findAll(), 'id', 'topic'), 
									array('prompt'=>'Select Topic:')); ?>
		<?php echo $form->error($model,'topic_id'); ?>
		</td>
	</tr>
	</table>	
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rating_id'); ?>
		<?php echo $form->textField($model,'rating_id'); ?>
		<?php echo $form->error($model,'rating_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->