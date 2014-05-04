<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'college-course-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'course'); ?>
		<?php echo $form->textField($model,'course',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'course'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'section'); ?>
		<?php echo $form->textField($model,'section',array('size'=>24,'maxlength'=>24)); ?>
		<?php echo $form->error($model,'section'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'college_id'); ?>
		<?php echo $form->textField($model,'college_id'); ?>
		<?php echo $form->error($model,'college_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'availableOnline'); ?>
		<?php echo $form->textField($model,'availableOnline'); ?>
		<?php echo $form->error($model,'availableOnline'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_user_id'); ?>
		<?php echo $form->textField($model,'create_user_id'); ?>
		<?php echo $form->error($model,'create_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time'); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_user_id'); ?>
		<?php echo $form->textField($model,'update_user_id'); ?>
		<?php echo $form->error($model,'update_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_time'); ?>
		<?php echo $form->textField($model,'update_time'); ?>
		<?php echo $form->error($model,'update_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->