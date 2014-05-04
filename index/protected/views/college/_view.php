<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('college')); ?>:</b>
	<?php echo CHtml::encode($data->college); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state_id')); ?>:</b>
	<?php echo CHtml::encode($data->state->state); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('city_id')); ?>:</b>
	<?php echo CHtml::encode($data->city->city); ?>
	<br />


</div>