<?php
$this->breadcrumbs=array(
	'Countries'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Country', 'url'=>array('index')),
	array('label'=>'Create Country', 'url'=>array('create')),
	array('label'=>'View Country', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Country', 'url'=>array('admin')),
);
?>

<h1>Update Country <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>