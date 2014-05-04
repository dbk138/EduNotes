<?php
$this->breadcrumbs=array(
	'Artifacts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Artifact', 'url'=>array('index')),
	array('label'=>'Create Artifact', 'url'=>array('create')),
	array('label'=>'Update Artifact', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Artifact', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Artifact', 'url'=>array('admin')),
);
?>

<h1>View Artifact #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'url',
		'title',
		'description',
		'subject_id',
		'rating_id',
		'category_id',
		'topic_id',
		'user_id',
		'create_user_id',
		'create_time',
		'update_user_id',
		'update_time',
	),
)); ?>
