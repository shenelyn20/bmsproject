<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Budget Management System for Local Government',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'password',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'excel'=>array(
			'class'=>'application.extensions.PHPExcel',
		),
		'ePdf'=>array(
			'class'=>'application.extensions.yii-pdf.EYiiPdf',
			'params'=>array(
				'HTML2PDF' => array(
					'librarySourcePath'=>'application.extensions.tcpdf.*',
					'classFile'=>'html2pdf.class.php',

				),
				'mpdf'=>array(
					'librarySourcePath'=>'application.extensions.mpdf.*',
					'constants'=>array(
						'_MPDF_TEMP_PATH'=>Yii::getPathOfAlias('application.runtime'),
					),
					'class'=>'mpdf',
					'defaultParams'=>array(
						'mode'=>'',
						'format'=>'A4',
						'default_font_size'=>12,
						'default_font'=>'Arial',
						'mgl'=>5,
						'mgr'=>5,
						'mgt'=>5,
						'mgb'=>5,
						'mgh'=>5,
						'mgf'=>5,
						'orientation'=>'L'
					),
				),
			),
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		'db'=>array(
			'tablePrefix'=>'',
			'connectionString'=>'pgsql:host=localhost;port=5432;dbname=postgres',
			'username'=>'postgres',
			'password'=>'password',
			'charset'=>'UTF8'
		),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
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
		'adminEmail'=>'webmaster@example.com',
	),
);