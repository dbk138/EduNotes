<?php
$this->breadcrumbs=array(
	'College Courses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CollegeCourse', 'url'=>array('index')),
	array('label'=>'Create CollegeCourse', 'url'=>array('create')),
	array('label'=>'View CollegeCourse', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CollegeCourse', 'url'=>array('admin')),
);
?>

<h1>Update CollegeCourse <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>