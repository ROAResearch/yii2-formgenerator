<?php

namespace roaresearch\yii2\formgenerator\roa\models;

use roaresearch\yii2\formgenerator\models as base;
use roaresearch\yii2\roa\hal\{Contract, ContractTrait};
use yii\{helpers\Url, web\Link};

/**
 * ROA contract handling Section records.
 */
class Section extends base\Section implements Contract
{
    use ContractTrait {
        getLinks as getContractLinks;
    }

    /**
     * @inheritdoc
     */
    protected $formClass = Form::class;

    /**
     * @inheritdoc
     */
    protected $sectionFieldClass = SectionField::class;

    /**
     * @inheritdoc
     */
    protected $fieldClass = Field::class;

    /**
     * @inheritdoc
     */
    public function getLinks()
    {
        $selfLink = $this->getSelfLink();

        return array_merge($this->getContractLinks(), [
            'fields' => $selfLink . '/field',
            'curies' => [
                new Link([
                    'name' => 'embeddable',
                    'href' => Url::to($selfLink, ['expand' => '{rel}']),
                    'title' => 'Embeddable and not Nestable related resources.',
                ]),
                new Link([
                    'name' => 'nestable',
                    'href' => Url::to($selfLink, ['expand' => '{rel}']),
                    'title' => 'Embeddable and Nestable related resources.',
                ]),
            ],
            'embeddable:fields' => 'fields',
            'nestable:form' => 'form',
        ]);
    }
    
    /**
     * @inheritdoc
     */
    protected function slugBehaviorConfig(): array
    {
        return [
            'resourceName' => 'section',
            'parentSlugRelation' => 'form',
        ];
    }

    /**
     * @inheritdoc
     */
    public function extraFields()
    {
        return ['form', 'fields', 'sectionFields'];
    }
}
