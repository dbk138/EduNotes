<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'eduNotes',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.user.models.*',
		'application.modules.user.components.*',
		'application.behaviors.model.taggable.*',		
		//'ext.krichtexteditor.KRichTextEditor',
	),

	'modules'=>array(
	
		'user',
		
		'profileRelations'=>array(
         'state'=>array(CActiveRecord::BELONGS_TO, 'State', 'state_id'),
		 'college'=>array(CActiveRecord::BELONGS_TO, 'College', 'college_id'),
                ),
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'A$73r0*D',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('68.82.57.243'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(			
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl' => array('/user/login'),
		),

		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'page/<alias>' => 'website/page',
			),
		),
		*/
			/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		
		'db'=>array(
			'connectionString' => 'mysql:host=zimbo.yaac.co;dbname=testedu',
			'emulatePrepare' => true,
			'username' => 'dbk138',
			'password' => 'T3chn1-To0l',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'dan@edunotes.com',
	),
);