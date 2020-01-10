<?php

namespace roaresearch\yii2\formgenerator\roa\resources;

use roaresearch\yii2\formgenerator\roa\models\DataType;
use roaresearch\yii2\formgenerator\roa\models\DataTypeSearch;

/**
 * CRUD resource for `DataType` records
 * @author Angel (Faryshta) Guevara <aguevara@alquimiadigital.mx>
 */
class DataTypeResource extends \roaresearch\yii2\roa\controllers\Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = DataType::class;

    /**
     * @inheritdoc
     */
    public $searchClass = DataTypeSearch::class;
}
