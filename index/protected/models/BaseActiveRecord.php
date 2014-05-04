<?php 

abstract class BaseActiveRecord extends CActiveRecord
{

/*
*Prepares create_time, create_user_id, update_time, and update_user_id before validation.
*/

protected function beforeValidate() {
	if($this->isNewRecord) {
		$this->create_time = $this->update_time = new CDbExpression('NOW()');
		$this->create_user_id = $this->update_user_id = Yii::app()->user->id;
	} else {
		$this->update_time = new CDbExpression('NOW()');
		$this->update_user_id = Yii::app()->user->id;
	}

return parent::beforeValidate();

	}
}