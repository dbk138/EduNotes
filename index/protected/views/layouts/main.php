<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<!-- Take out these next two lines in production-->
	<meta name="robots" content="noindex,nofollow">
	<meta name="robots" content="NOARCHIVE,NOODP,NOYDIR">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">
		<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=site/index">
		<img src="<?php echo Yii::app()->request->baseUrl;?>/images/edunotes.png" alt="eduNotes Home"></img>
		</a>
		</div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index'), 'visible'=>Yii::app()->user->isGuest),
				array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Dashboard"), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Notes', 'url'=>array('/note/create')),
				array('label'=>'Library', 'url'=>array('/library/index')),
				array('label'=>'Artifacts', 'url'=>array('/artifact/create')),
				array('url'=>array('/manage/index'), 'label'=>'Manage', 'visible'=>Yii::app()->getModule('user')->isAdmin()),
				//array('label'=>'Categories', 'url'=>array('/category/index'), 'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'Subjects', 'url'=>array('/subject/index'), 'visible'=>!Yii::app()->user->isGuest),								
				//array('label'=>'Topics', 'url'=>array('/topic/index'), 'visible'=>!Yii::app()->user->isGuest),	
				array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),				
				array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),			
				array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'Profile', 'url'=>array('user/view', 'id'=>Yii::app()->user->getId()), 'visible'=>!Yii::app()->user->isGuest),				
				),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
	<?php echo CHtml::link("Contact Us", array('/site/contact')); ?> <br />
		Copyright &copy; <?php echo date('Y'); ?> eduNotes.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
