<?php

namespace app\fixtures;

use roaresearch\yii2\formgenerator\fixtures\DataTypeFixture;
use roaresearch\yii2\formgenerator\models\Field;

/**
 * Fixture to load `Field` records.
 * @author Angel (Faryshta) Guevara <aguevara@alquimiadigital.mx>
 */
class FieldFixture extends \yii\test\ActiveFixture
{
    /**
     * @inheritdoc
     */
    public $modelClass = Field::class;

    /**
     * @inheritdoc
     */
    public $dataFile = __DIR__ . '/data/field.php';

    /**
     * @inheritdoc
     */
    public $depends = [DataTypeFixture::class];
}
