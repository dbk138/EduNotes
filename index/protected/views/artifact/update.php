<?php
$this->breadcrumbs=array(
	'Artifacts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Artifact', 'url'=>array('index')),
	array('label'=>'Create Artifact', 'url'=>array('create')),
	array('label'=>'View Artifact', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Artifact', 'url'=>array('admin')),
);
?>

<h1>Update Artifact <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>