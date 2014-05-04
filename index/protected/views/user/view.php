<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->username; ?>'s Profile</h1>
<p>
You last logged in on <?php echo date('l, F d, Y, g:i a', Yii::app()->user->lastLoginTime); ?>
</p>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
/*		'activationkey',
		'superuser',
		'status',
		'last_login_time',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',*/
	),
)); ?>
