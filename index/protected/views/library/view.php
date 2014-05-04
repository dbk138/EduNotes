<?php
$this->breadcrumbs=array(
	'Libraries'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Library', 'url'=>array('index')),
	array('label'=>'Create Library', 'url'=>array('create')),
	array('label'=>'Update Library', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Library', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Library', 'url'=>array('admin')),
);
?>

<h1>View Library #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_id',
		'subject_id',
		'topic_id',
		'title',
		'body',
		'tags',
	),
)); ?>
