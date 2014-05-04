<?php
$this->breadcrumbs=array(
	'College Courses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CollegeCourse', 'url'=>array('index')),
	array('label'=>'Manage CollegeCourse', 'url'=>array('admin')),
);
?>

<h1>Create CollegeCourse</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>