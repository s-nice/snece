<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
	'aliases' => [
		// '@mdm/admin' => 'path/to/your/extracted',
		'@mdm/admin' => '@vendor/mdmsoft/yii2-admin',
	],
	'modules' => [
		'admin' => [
			'class' => 'mdm\admin\Module',
		]
	],
	'as access' => [
		'class' => 'mdm\admin\components\AccessControl',
		'allowActions' => [
			'site/*',
			'admin/*', // add or remove allowed actions to this list
		],
	],
	'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
		'authManager' => [
			'class' => 'yii\rbac\PhpManager', // or use 'yii\rbac\DbManager'
		],
		'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
