<?php

namespace roaresearch\yii2\formgenerator\roa\resources;

use roaresearch\yii2\formgenerator\roa\models\SolicitudeValue;
use roaresearch\yii2\formgenerator\roa\models\SolicitudeValueSimpleSearch;

/**
 * Search resource for `SolicitudeValue` records
 * @author Angel (Faryshta) Guevara <aguevara@alquimiadigital.mx>
 */
class SolicitudeValueResource extends \roaresearch\yii2\roa\controllers\Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = SolicitudeValue::class;

    /**
     * @inheritdoc
     */
    public $searchClass = SolicitudeValueSimpleSearch::class;

    /**
     * @inheritdoc
     */
    public function verbs()
    {
        return [
            'index' => ['GET', 'HEAD'],
        ];
    }
}
