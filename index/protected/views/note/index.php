<?php //if(!empty($_GET['tag'])): ?>
<!--<h1>Notes Tagged with <i><?php //echo CHtml::encode($_GET['tag']); ?></i></h1>-->
<?php //endif; ?>

<?php
$this->breadcrumbs=array(
	'Notes',
);

$this->menu=array(
	array('label'=>'Create Note', 'url'=>array('create')),
	array('label'=>'Manage Note', 'url'=>array('admin')),
);
?>

<h1>Notes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
