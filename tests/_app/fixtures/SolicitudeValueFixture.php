<?php

namespace app\fixtures;

use roaresearch\yii2\formgenerator\models\SolicitudeValue;

/**
 * Fixture to load `SolicitudeValue` records.
 * @author Angel (Faryshta) Guevara <aguevara@alquimiadigital.mx>
 */
class SolicitudeValueFixture extends \yii\test\ActiveFixture
{
    /**
     * @inheritdoc
     */
    public $modelClass = SolicitudeValue::class;

    /**
     * @inheritdoc
     */
    public $dataFile = __DIR__ . '/data/solicitude_value.php';

    /**
     * @inheritdoc
     */
    public $depends = [SolicitudeFixture::class, SectionFieldFixture::class];
}
