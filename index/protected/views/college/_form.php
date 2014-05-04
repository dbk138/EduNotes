<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'college-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'college'); ?>
		<?php echo $form->textField($model,'college',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'college'); ?>
	</div>

	<!-- Start -->
		<div class="row">
		<?php echo $form->labelEx($model,'state_id'); ?>
		<?php echo $form->dropDownList($model,
									'state_id', 
									CHtml::listData(State::model()->findAll(), 'id', 'state'), 
									//array(), 
									array('prompt'=>'Select State',
										'ajax' => array(
											'type' => 'POST',
											'url' => CController::createUrl('dynamicCity'),
											'update' => '#'.CHtml::activeId($model,'city_id')
											))); ?>
		<?php echo $form->error($model,'state_id'); ?>
		</div>
		
		<div class="row">
		<?php echo $form->labelEx($model,'city_id'); ?>
		<?php echo $form->dropDownList($model,
									'city_id', 
									array(),
									//CHtml::listData(Topic::model()->findAll(), 'id', 'topic'), 
									array('prompt'=>'Select City:')); ?>
		<?php echo $form->error($model,'city_id'); ?>
		</div>
	<!-- END -->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->