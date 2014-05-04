<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-register-form',
	'enableAjaxValidation'=>false,
)); ?>
	<p><h1>Sign Up for eduNotes!</h1></p>
	
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password_repeat'); ?>
		<?php echo $form->passwordField($model,'password_repeat', array('size'=>20, 'maxlength'=>256)); ?>
		<?php echo $form->error($model,'password_repeat'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	
	<?php 
		if(CCaptcha::checkrequirements() && Yii::app()->user->isGuest): ?>
		<p>
		<?php echo CHtml::activeLabelEx($model, 'verifyCode')?>
		<?php $this->widget('CCaptcha')?>
		</p>
		<p>
		<?php echo CHtml::activeTextField($model, 'verifyCode')?>
		<?php echo CHtml::error($model, 'verifyCode')?>
		</p>
		<?php endif ?>
		
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Sign Up' : 'Save'); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->