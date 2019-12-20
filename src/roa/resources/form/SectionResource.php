<?php

namespace roaresearch\yii2\formgenerator\roa\resources\form;

use Yii;
use roaresearch\yii2\formgenerator\roa\models\Section;
use roaresearch\yii2\formgenerator\roa\models\SectionSearch;

/**
 * CRUD resource for `Section` records
 * @author Angel (Faryshta) Guevara <aguevara@alquimiadigital.mx>
 */
class SectionResource extends \roaresearch\yii2\roa\controllers\Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = Section::class;

    /**
     * @inheritdoc
     */
    public $searchClass = SectionSearch::class;

    /**
     * @inheritdoc
     */
    public $filterParams = ['form_id'];
}
