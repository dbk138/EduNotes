<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'note-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<?php 
		$this->widget('ext.ckeditor.CKEditorWidget',array(
		"model"=>$model,                 # Data-Model
		"attribute"=>'note',          # Attribute in the Data-Model
		"defaultValue"=>"",     # Optional
		# Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
		"config" => array(
		"height"=>"400px",
		"width"=>"100%",
		"toolbar"=>"Basic",
      ),
	  ));
	  ?>
	  
	  <?php
	  /*
			$this->widget('KRichTextEditor', array(
			'model' => $model,
			'value' => $model->isNewRecord ? $model->note : '',
			'attribute' => 'note',
			'options' => array(
				'theme_advanced_resizing' => 'true',
				'theme' => 'advanced',
				'theme_advanced_toolbar_location' => 'top',
				'theme_advanced_toolbar_align' => 'left',
				'theme_advanced_buttons1' => "bold,italic,underline,strikethrough,|,fontselect,fontsizeselect",
				'theme_advanced_buttons2' => "bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,image,cleanup,code,|,forecolor,backcolor",
				'theme_advanced_buttons3' => "hr,removeformat,visualaid,separator,sub,sup,separator,charmap",
				'theme_advanced_resizing_min_width' => "500",
				'theme_advanced_resizing_min_height' => "320",
				'theme_advanced_resizing_max_width' => "720",
				'theme_advanced_resizing_max_height' => "400",
				'theme_advanced_statusbar_location' => 'bottom',
								)
			)
	);
	*/
?>
	    
<div class="row">
	
        <?php $this->widget('application.components.widgets.tag.TagWidget', array(
            'url'=> Yii::app()->request->baseUrl.'/tags/json/',
            'tags' => $model->getTags()
        ));
        ?>
		<p class="hint">Use tags to describe your note. It will make it easier to search for it!</p>
  		
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>

	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
