<?php

namespace roaresearch\yii2\formgenerator\roa\modules;

use roaresearch\yii2\formgenerator\roa\resources;

class Version extends \roaresearch\yii2\roa\modules\ApiVersion
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = resources::class;

    public const FORM_ROUTE = 'form';
    public const SECTION_ROUTE = self::FORM_ROUTE . '/<form_id:\d+>/section';
    public const SECTION_FIELD_ROUTE = self::SECTION_ROUTE . '/<section_id:\d+>/field';

    public const DATA_TYPE_ROUTE = 'data-type';

    public const FIELD_ROUTE = 'field';
    public const FIELD_RULE_ROUTE = self::FIELD_ROUTE . '/<field_id:\d+>/rule';
    public const FIELD_RULE_PROPERTY_ROUTE = self::FIELD_RULE_ROUTE
        . '/<rule_id:\d+>/property';

    public const SOLICITUDE_ROUTE = self::FORM_ROUTE . '/<form_id:\d+>/solicitude';
    public const SOLICITUDE_VALUE_ROUTE = self::SOLICITUDE_ROUTE
        . '/<solicitude_id:\d+>/value';

    public const SOLICITUDE_VALUE_SEARCH_ROUTE = 'solicitude-value';

    /**
     * @inheritdoc
     */
    public $resources = [
        self::FORM_ROUTE,
        self::SECTION_ROUTE,
        self::SECTION_FIELD_ROUTE,

        self::DATA_TYPE_ROUTE,

        self::FIELD_ROUTE,
        self::FIELD_RULE_ROUTE,
        self::FIELD_RULE_PROPERTY_ROUTE => [
            'class' => resources\field\rule\PropertyResource::class,
            'urlRule' => ['tokens' => ['{id}' => '<id:\w+>']],
        ],

        self::SOLICITUDE_ROUTE,
        self::SOLICITUDE_VALUE_ROUTE => [
            'class' => resources\form\solicitude\ValueResource::class,
            'urlRule' => [
                'tokens' => [
                    '{section_id}' => '<section_id:\d+>',
                    '{id}' => '<id:\d+>',
                ],
                'patterns' => [
                    'PUT,PATCH {section_id}/{id}' => 'update',
                    'DELETE {section_id}/{id}' => 'delete',
                    'GET,HEAD {section_id}/{id}' => 'view',
                    'POST' => 'create',
                    'GET,HEAD {section_id}' => 'index',
                    'GET,HEAD' => 'index',
                    '{section_id}' => 'options',
                    '{section_id}/{id}' => 'options',
                    '' => 'options',
                ],
            ],
        ],
        self::SOLICITUDE_VALUE_SEARCH_ROUTE => [
            'class' => resources\SolicitudeValueResource::class,
            'urlRule' => [
                'tokens' => [
                ],
                'patterns' => [
                    'GET,HEAD' => 'index',
                    '' => 'options',
                ],
            ],
        ],
    ];
}
