<?php

namespace roaresearch\yii2\formgenerator\roa\models;

use roaresearch\yii2\roa\ResourceSearch;
use yii\{data\ActiveDataProvider, web\NotFoundHttpException};

/**
 * Contract to filter and sort collections of `Form` records.
 * @author Angel (Faryshta) Guevara <aguevara@alquimiadigital.mx>
 */
class FieldRulePropertySearch extends FieldRuleProperty implements
    ResourceSearch
{
    /**
     * @inhertidoc
     */
    protected function slugBehaviorConfig(): array
    {
        return [
            'idAttribute' => [],
            'resourceName' => 'property',
        ];
    }

    /**
     * @inhertidoc
     */
    public function rules()
    {
        return [
            [['rule_id'], 'required'],
            [['rule_id', 'created_by'], 'integer'],
        ];
    }

    /**
     * @inhertidoc
     */
    public function search(
        array $params,
        ?string $formName = ''
    ): ?ActiveDataProvider {
        $this->load($params, $formName);
        if (!$this->validate()) {
            return null;
        }
        if (null === $this->rule) {
            throw new NotFoundHttpException('Rule not found');
        }
        $this->rule->checkAccess($params);
        $class = get_parent_class();

        return new ActiveDataProvider([
            'query' => $class::find()->andFilterWhere([
                'rule_id' => $this->rule_id,
                'created_by' => $this->created_by,
            ]),
        ]);
    }
}
