<?php

namespace roaresearch\yii2\formgenerator\roa\models;

use roaresearch\yii2\roa\ResourceSearch;
use yii\data\ActiveDataProvider;

/**
 * Contract to filter and sort collections of `DataType` records.
 * @author Angel (Faryshta) Guevara <aguevara@alquimiadigital.mx>
 */
class DataTypeSearch extends DataType implements ResourceSearch
{
    /**
     * @inhertidoc
     */
    protected function slugBehaviorConfig(): array
    {
        return [
            'idAttribute' => [],
            'resourceName' => 'data-type',
        ];
    }

    /**
     * @inhertidoc
     */
    public function rules()
    {
        return [
            [['name', 'label'], 'string'],
            [['created_by'], 'integer'],
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
        $class = get_parent_class();

        return new ActiveDataProvider([
            'query' => $class::find()->andFilterWhere([
                    'created_by' => $this->created_by,
                ])
                ->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'label', $this->label]),
        ]);
    }
}
