<?php

use roaresearch\yii2\formgenerator\roa\modules\Version as FormgeneratorVersion;
use roaresearch\yii2\roa\controllers\ProfileResource;
use yii\web\Response;

return yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/common.php',
    [
        'id' => 'yii2-formgenerator-tests',
        'bootstrap' => ['api'],
        'modules' => [
            'api' => [
                'class' => roaresearch\yii2\roa\modules\ApiContainer::class,
                'identityClass' => app\models\User::class,
                'versions' => [
                    'f1' => [
                        'class' => FormgeneratorVersion::class,
                    ],
                ],
            ],
            'rmdb' => [
                'class' => roaresearch\yii2\rmdb\Module::class,
            ],
        ],
        'components' => [
            'mailer' => [
                'useFileTransport' => true,
            ],
            'user' => ['identityClass' => app\models\User::class],
            'urlManager' => [
                'showScriptName' => true,
                'enablePrettyUrl' => true,
            ],
            'request' => [
                'cookieValidationKey' => 'test',
                'enableCsrfValidation' => false,
            ],
        ],
        'params' => [],
    ]
);
