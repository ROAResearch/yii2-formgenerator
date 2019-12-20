<?php

namespace roaresearch\yii2\formgenerator\roa\resources\form\section;

use roaresearch\yii2\formgenerator\roa\models\SectionField;
use roaresearch\yii2\formgenerator\roa\models\SectionFieldSearch;

/**
 * CRUD resource for `SectionField` records
 * @author Angel (Faryshta) Guevara <aguevara@alquimiadigital.mx>
 */
class FieldResource extends \roaresearch\yii2\roa\controllers\Resource
{
    /**
     * @inheritdoc
     */
    public $idAttribute = 'field_id';

    /**
     * @inheritdoc
     */
    public $modelClass = SectionField::class;

    /**
     * @inheritdoc
     */
    public $searchClass = SectionFieldSearch::class;

    /**
     * @inheritdoc
     */
    public $filterParams = ['section_id'];
}
