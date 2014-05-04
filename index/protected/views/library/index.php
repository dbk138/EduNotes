<?php
$this->breadcrumbs=array(
	'Libraries',
);

$this->menu=array(
	array('label'=>'Create Library', 'url'=>array('create')),
	array('label'=>'Manage Library', 'url'=>array('admin')),
);
?>

<h1>Libraries</h1>
<ul>
<li><?php echo CHtml::link("Categories", array('/category/index')); ?></li>
<li><?php echo CHtml::link("Subjects", array('/subject/index')); ?> </li>
<li><?php echo CHtml::link("Topics", array('/topic/index')); ?> </li>
</ul>
<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */?>
