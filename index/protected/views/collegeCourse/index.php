<?php
$this->breadcrumbs=array(
	'College Courses',
);

$this->menu=array(
	array('label'=>'Create CollegeCourse', 'url'=>array('create')),
	array('label'=>'Manage CollegeCourse', 'url'=>array('admin')),
);
?>

<h1>College Courses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
