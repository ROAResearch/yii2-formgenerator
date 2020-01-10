<?php

namespace roaresearch\yii2\formgenerator\roa\models;

use roaresearch\yii2\formgenerator\models as base;
use roaresearch\yii2\roa\hal\{Contract, ContractTrait};
use yii\{helpers\Url, web\Link, web\NotFoundHttpException};

/**
 * ROA contract handling FieldRuleProperty records.
 */
class FieldRuleProperty extends base\FieldRuleProperty implements Contract
{
    use ContractTrait {
        getLinks as getContractLinks;
    }

    /**
     * @inheritdoc
     */
    protected $ruleClass = FieldRule::class;

    /**
     * @inheritdoc
     */
    public function getLinks()
    {
        $selfLink = $this->getSelfLink();

        return array_merge($this->getContractLinks(), [
            'properties' => $selfLink . '/property',
            'curies' => [
                new Link([
                    'name' => 'nestable',
                    'href' => Url::to($selfLink, ['expand' => '{rel}']),
                    'title' => 'Embeddable and Nestable related resources.',
                ]),
            ],
            'nestable:rule' => 'rule',
        ]);
    }

    /**
     * @inheritdoc
     */
    protected function slugBehaviorConfig(): array
    {
        return [
            'idAttribute' => 'property',
            'resourceName' => 'property',
            'parentSlugRelation' => 'rule',
        ];
    }

    /**
     * @inheritdoc
     */
    public function extraFields()
    {
        return ['rule'];
    }
}
