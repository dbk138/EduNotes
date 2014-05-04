<?php
$this->breadcrumbs=array(
	'Artifacts',
);

$this->menu=array(
	array('label'=>'Create Artifact', 'url'=>array('create')),
	array('label'=>'Manage Artifact', 'url'=>array('admin')),
);
?>

<h1>Artifacts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
