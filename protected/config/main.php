<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$packages = require_once(dirname(__FILE__).'/packages.php');
$bp = dirname(__FILE__).DIRECTORY_SEPARATOR.'..';
return array(
	'basePath'=>$bp,
	'name'=>'PlaceChannels',

	// preloading 'log' component
	'preload'=>array('log'),

    'aliases' => array(
        'bootstrap' => $bp.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'bootstrap',
    ),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'bootstrap.helpers.*',
        'bootstrap.helpers.widgets.*',
        'bootstrap.helpers.form.*',
        'bootstrap.helpers.helpers.*',
        'bootstrap.helpers.behaviors.*',
	),

	'modules'=>array(
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'muha1990',
            'ipFilters'=>array('77.47.132.41','77.47.220.130'),
        ),

        'analytics',
        'link'
    ),
	
	'defaultController'=>'main',

	// application components
	'components'=>array(
        'request'=>array(
            'enableCsrfValidation'=>true,
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',
        ),

        'GoogleApi' =>array(
            'class' => 'application.extensions.GoogleApiClient.GoogleApiComponent',

            'YouTubeAPI_client_id'=>'175295166942-vhd80g8279s56ff3h9984ppkb212h3aq.apps.googleusercontent.com',
            'YouTubeAPI_client_secret'=>'FEGrMU1JNvEsoZMagfdFM9Ft',
            'YouTubeAPI_redirect_uri'=>'http://placechannels.com/index.php?r=oauth/callback',
            'YouTubeAPI_app_name'=>'PlaceChannels',
            'YouTubeAPI_developer_key'=>'AI39si5rabu7TQcRn1A350AFgpvhoGEZlcSiL9dM3MBgxm4b5Kb0xQbhovxaOg7GlV21cuCGm_c5VJ_Y6lr69D3mv8TyPSUxmQ',
            'YouTubeAPI_scope'=>array(
                'https://www.googleapis.com/auth/yt-analytics.readonly',
                'https://www.googleapis.com/auth/youtube.readonly',
                'https://www.googleapis.com/auth/userinfo.email',
                'https://www.googleapis.com/auth/userinfo.profile'
            )
        ),
		
        'clientScript'=>array(
            'packages'=>$packages,
        ),

        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
            'loginUrl'=>array('main/login'),
            'class'=>'WebUser',
        ),
        'authManager' => array(
            // Будем использовать свой менеджер авторизации
            'class' => 'PhpAuthManager',
            // Роль по умолчанию. Все, кто не админы, модераторы и юзеры — гости.
            'defaultRoles' => array('guest'),
        ),
        /*'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),*/
		/*'db'=>array(
			'connectionString' => 'sqlite:protected/data/blog.db',
			'tablePrefix' => 'tbl_',
		),*/
		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'mysql:host=ef954db.mirohost.net;dbname=placecha',
			'emulatePrepare' => true,
			'username' => 'u_userhost',
			'password' => 'GgSJqDh9',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'main/error',
		),
		/*'urlManager'=>array(
            'urlFormat' => 'path',
            'showScriptName'=>false,
            'urlSuffix' => '',
            'rules'=>array(
                'youtubers' => array('main/youtubers', 'urlSuffix' => ''),
                'brands' => array('main/brands', 'urlSuffix' => ''),
                'joinYouTubers' => array('main/joinYouTubers', 'urlSuffix' => ''),
                'joinBrands' => array('main/joinBrands', 'urlSuffix' => ''),
                'login' => array('main/login', 'urlSuffix' => ''),
                'logout' => array('main/logout', 'urlSuffix' => ''),
                //'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<action:\w+>' => 'main/<action>',
            ),
		),*/
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
        'cache'=>array('class'=>'system.caching.CFileCache'),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);