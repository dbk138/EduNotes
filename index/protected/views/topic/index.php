<?php if(!empty($_GET['tag'])): ?>
<h1>Topics Tagged with <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php endif; ?>

<?php
$this->breadcrumbs=array(
	'Library'=>array('library/index'),
	'Topics',
);

$this->menu=array(
	array('label'=>'Create Topic', 'url'=>array('create')),
	array('label'=>'Manage Topic', 'url'=>array('admin')),
);
?>

<h1>Topics</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
