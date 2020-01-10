<?php

namespace roaresearch\yii2\formgenerator\roa\models;

use roaresearch\yii2\formgenerator\models as base;
use roaresearch\yii2\roa\hal\{Contract, ContractTrait};
use yii\{helpers\Url, web\Link, web\NotFoundHttpException};

/**
 * ROA contract handling Solicitude records.
 */
class Solicitude extends base\Solicitude implements Contract
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
    protected $solicitudeValueClass = SolicitudeValue::class;

    /**
     * @inheritdoc
     */
    public function getLinks()
    {
        $selfLink = $this->getSelfLink();

        return array_merge($this->getContractLinks(), [
            'values' => $selfLink . '/value',
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
            'embeddable:values' => 'values',
            'nestable:form' => 'form',
        ]);
    }

    /**
     * @inheritdoc
     */
    protected function slugBehaviorConfig(): array
    {
        return [
            'resourceName' => 'solicitude',
            'parentSlugRelation' => 'form',
            'checkAccess' => function ($params) {
                if (
                    isset($params['solicitude_id'])
                    && $params['solicitude_id'] != $this->id
                ) {
                    throw new NotFoundHttpException(
                        'Solicitude doesnt contain the requested route.'
                    );
                }
            },
        ];
    }

    /**
     * @inheritdoc
     */
    public function extraFields()
    {
        return ['form', 'values'];
    }
}
