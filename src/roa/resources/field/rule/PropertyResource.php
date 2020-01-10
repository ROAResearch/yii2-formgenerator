<?php

namespace roaresearch\yii2\formgenerator\roa\resources\field\rule;

use roaresearch\yii2\formgenerator\roa\models\FieldRuleProperty;
use roaresearch\yii2\formgenerator\roa\models\FieldRulePropertySearch;
use yii\db\ActiveQuery;

/**
 * CRUD resource for `FieldRuleProperty` records
 * @author Angel (Faryshta) Guevara <aguevara@alquimiadigital.mx>
 */
class PropertyResource extends \roaresearch\yii2\roa\controllers\Resource
{
    /**
     * @inheritdoc
     */
    public $idAttribute = 'property';

    /**
     * @inheritdoc
     */
    public $modelClass = FieldRuleProperty::class;

    /**
     * @inheritdoc
     */
    public $searchClass = FieldRulePropertySearch::class;

    /**
     * @inheritdoc
     */
    public $filterParams = ['field_id', 'rule_id'];

    /**
     * @inheritdoc
     */
    public function baseQuery(): ActiveQuery
    {
        return parent::baseQuery()->innerJoinWith(['rule']);
    }
}
