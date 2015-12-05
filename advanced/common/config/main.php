<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
	'aliases' => [
		//'@mdm/admin' => 'path/to/your/extracted',
		'@mdm/admin' => '@vendor/mdmsoft/yii2-admin',
	],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		'authManager' => [
			'class' => 'yii\rbac\DbManager',
		],
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'enableStrictParsing' => false,
			'rules' => [
				'<controller:\w+>s' => '<controller>/index',
				'<controller:\w+>/<id:\d+>' => '<controller>/view',
			],
		],
    ],
	'language' => 'zh-CN',
];
