<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
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
