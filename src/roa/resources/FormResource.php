<?php

namespace roaresearch\yii2\formgenerator\roa\resources;

use roaresearch\yii2\formgenerator\roa\models\Form;
use roaresearch\yii2\formgenerator\roa\models\FormSearch;

/**
 * CRUD resource for `Form` records
 * @author Angel (Faryshta) Guevara <aguevara@alquimiadigital.mx>
 */
class FormResource extends \roaresearch\yii2\roa\controllers\Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = Form::class;

    /**
     * @inheritdoc
     */
    public $searchClass = FormSearch::class;
}
