<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'language' => 'ru-Ru',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app'       => 'app.php',
                        'app/error' => 'error.php',
                    ],
                    'forceTranslation' => true,
                ],
            ]
        ],
        'adminAuthManager' => [
            'class' => 'yii\rbac\DbManager',
            'assignmentTable' => '{{%admin_rbac_assignments}}',
            'ruleTable' => '{{%admin_rbac_rules}}',
            'itemTable' => '{{%admin_rbac_items}}',
            'itemChildTable' => '{{%admin_rbac_item_children}}',
        ],
        'userAuthManager' => [
            'class' => 'yii\rbac\DbManager',
            'assignmentTable' => '{{%user_rbac_assignments}}',
            'ruleTable' => '{{%user_rbac_rules}}',
            'itemTable' => '{{%user_rbac_items}}',
            'itemChildTable' => '{{%user_rbac_item_children}}',
        ]
    ],
];
