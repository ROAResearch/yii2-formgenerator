<?php

namespace app\fixtures;

use roaresearch\yii2\formgenerator\models\Section;

/**
 * Fixture to load `Section` records.
 * @author Angel (Faryshta) Guevara <aguevara@alquimiadigital.mx>
 */
class SectionFixture extends \yii\test\ActiveFixture
{
    /**
     * @inheritdoc
     */
    public $modelClass = Section::class;

    /**
     * @inheritdoc
     */
    public $dataFile = __DIR__ . '/data/section.php';
    /**
     * @inheritdoc
     */
    public $depends = [FormFixture::class];
}
