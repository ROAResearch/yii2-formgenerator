<?php

namespace roaresearch\yii2\formgenerator\roa\resources\field;

use Yii;
use roaresearch\yii2\formgenerator\roa\models\FieldRule;

/**
 * CRUD resource for `FieldRule` records
 * @author Angel (Faryshta) Guevara <aguevara@alquimiadigital.mx>
 */
class RuleResource extends \roaresearch\yii2\roa\controllers\Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = FieldRule::class;

    /**
     * @inheritdoc
     */
    public $filterParams = ['field_id', 'rule_class', 'created_by'];

    /**
     * @inheritdoc
     */
    public function verbs()
    {
        $verbs = parent::verbs();
        unset($verbs['update']);

        return $verbs;
    }
}
