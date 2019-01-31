<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'ERA',
    'name' => 'Employee Rating App',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'admin' => [
            'layout' => 'left-menu',
            'mainLayout' => '@app/views/layouts/main.php',
            'class' => 'mdm\admin\Module',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'app\models\User',
                    'idField' => 'id',
                    'usernameField' => 'username',
                    'fullnameField' => 'pegawai.nama_pegawai',
                    'extraColumns' => [
                        [
                            'attribute' => 'nama_pegawai',
                            'label' => 'Nama',
                            'value' => function($model) {
                                return $model->pegawai->nama_pegawai;
                            },
                        ],
                        [
                            'attribute' => 'status',
                            'filter' => [
                                10 => 'ACTIVE',
                                0 => 'NON ACTIVE',
                            ],
                            'value' => function($model) {
                                return $model->status === app\models\User::STATUS_ACTIVE ? 'ACTIVE' : 'NON ACTIVE';
                            },
                        ],
                        'email',
                        'created_date',
                    ],
                    'searchClass' => 'app\models\UserSearch'
                ],
            ],
            'menus' => [
                'user' => null,
                'User' => [
                    'label' => 'User',
                    'url' => ['/user/index'],
                ],
            ],
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
                // '*',
                'site/*',
                // 'admin/*',
                // 'some-controller/some-action',
                // The actions listed here will be allowed to everyone including guests.
                // So, 'admin/*' should not appear here in the production, of course.
                // But in the earlier stages of your development, you may probably want to
                // add a lot of actions here until you finally completed setting up rbac,
                // otherwise you may not even take a first step.
        ]
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'KyAa1VwUqMgT5HTtMXtdTzT8TLX15_qV',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            // 'identityClass' => 'mdm\admin\models\User',
            // 'loginUrl' => ['user/login'],
            // 'enableAutoLogin' => false,
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'helpers' => [
            'class' => 'app\components\Helpers',
        ],
        'db' => $db,
        'authManager' => [
            'class' => 'yii\rbac\DbManager',

        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
        // 'view' => [  
        //     'theme' => [
        //         'class' => 'yii\base\Theme',
        //         'pathMap' => ['@app/views' => 'themes/material-default'],
        //         'baseUrl' => '@web/themes/material-default',
        //     ],  
        // ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        // 'allowedIPs' => ['127.0.0.1', '::1'],
        'allowedIPs' => ['*'],
        // 'generators' => [
        // 'crud' => [
        //     'class' => 'yii\gii\generators\crud\Generator',
        //     'templates' => [ // setting materializecss templates
        //         'materializecss' => '@vendor/macgyer/yii2-materializecss/src/gii-templates/generators/crud/materializecss',
        //     ],
        // ],
    // ],
    ];
}

return $config;
