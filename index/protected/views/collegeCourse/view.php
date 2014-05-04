<?php
$this->breadcrumbs=array(
	'College Courses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CollegeCourse', 'url'=>array('index')),
	array('label'=>'Create CollegeCourse', 'url'=>array('create')),
	array('label'=>'Update CollegeCourse', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CollegeCourse', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CollegeCourse', 'url'=>array('admin')),
);
?>

<h1>View CollegeCourse #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'course',
		'section',
		'college_id',
		'availableOnline',
		'create_user_id',
		'create_time',
		'update_user_id',
		'update_time',
	),
)); ?>
