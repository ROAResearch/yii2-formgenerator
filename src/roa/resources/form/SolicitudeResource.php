<?php

namespace roaresearch\yii2\formgenerator\roa\resources\form;

use roaresearch\yii2\formgenerator\roa\models\Solicitude;
use roaresearch\yii2\formgenerator\roa\models\SolicitudeSearch;

/**
 * CRUD resource for `Solicitude` records
 * @author Angel (Faryshta) Guevara <aguevara@alquimiadigital.mx>
 */
class SolicitudeResource extends \roaresearch\yii2\roa\controllers\Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = Solicitude::class;

    /**
     * @inheritdoc
     */
    public $searchClass = SolicitudeSearch::class;

    /**
     * @inheritdoc
     */
    public $filterParams = ['form_id'];
}
