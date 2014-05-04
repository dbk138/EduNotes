<?php
$this->breadcrumbs=array(
		'Manage',
);


$this->widget('zii.widgets.CMenu', array(
    'items'=>array(
      	array('label'=>'Create Library', 'url'=>array('library/create')),
		array('label'=>'Manage Library', 'url'=>array('library/admin')),
		array('label'=>'Create Category', 'url'=>array('category/create')),
		array('label'=>'Create Subject', 'url'=>array('subject/create')),
		array('label'=>'Create Topic', 'url'=>array('topic/create')),
    ),
));
?>

