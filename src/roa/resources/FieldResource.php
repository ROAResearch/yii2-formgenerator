<?php

namespace roaresearch\yii2\formgenerator\roa\resources;

use roaresearch\yii2\formgenerator\roa\models\Field;
use roaresearch\yii2\formgenerator\roa\models\FieldSearch;
use yii\db\ActiveQuery;

/**
 * CRUD resource for `Field` records
 * @author Angel (Faryshta) Guevara <aguevara@alquimiadigital.mx>
 */
class FieldResource extends \roaresearch\yii2\roa\controllers\Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = Field::class;

    /**
     * @inheritdoc
     */
    public $searchClass = FieldSearch::class;

    /**
     * @inheritdoc
     */
    public function baseQuery(): ActiveQuery
    {
        return parent::baseQuery()->alias('field')->with(['dataType']);
    }
}
