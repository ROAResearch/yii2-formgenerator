<?php

namespace roaresearch\yii2\formgenerator\roa\models;

use roaresearch\yii2\formgenerator\models as base;
use roaresearch\yii2\roa\hal\{Contract, ContractTrait};
use yii\{helpers\Url, web\Link};

/**
 * ROA contract handling form SectionField records.
 */
class SectionField extends base\SectionField implements Contract
{
    use ContractTrait {
        getLinks as getContractLinks;
    }

    /**
     * @inheritdoc
     */
    protected $sectionClass = Section::class;

    /**
     * @inheritdoc
     */
    protected $fieldClass = Field::class;

    /**
     * @inheritdoc
     */
    protected $solicitudeValueClass = SolicitudeValue::class;

    /**
     * @inheritdoc
     */
    public function getLinks()
    {
        $selfLink = $this->getSelfLink();

        return array_merge($this->getContractLinks(), [
            'field' => $this->field->getSelfLink(),
        ]);
    }

    /**
     * @inheritdoc
     */
    protected function slugBehaviorConfig(): array
    {
        return [
            'idAttribute' => 'field_id',
            'resourceName' => 'field',
            'parentSlugRelation' => 'section',
        ];
    }

    /**
     * @inheritdoc
     */
    public function extraFields()
    {
        return ['field', 'section', 'solicitudeValuesDetail'];
    }
}
