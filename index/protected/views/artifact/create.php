<?php
$this->breadcrumbs=array(
	'Artifacts'=>array('index'),
	'Add Artifact',
);

$this->menu=array(
	array('label'=>'Browse Artifacts', 'url'=>array('index')),
	array('label'=>'Manage Artifacts', 'url'=>array('admin')),
);
?>

<p>
<h3>What is a Artifact?</h3>
<br />
At eduNotes we like to think of a artifact as a highly valuable online resource or web page that will aid you in your quest for education. <br />
<br />Please feel free to add a artifact below so that others can learn of the valuable resources available to them on the internet.<br />
</p>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>