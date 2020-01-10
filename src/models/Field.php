<?php

namespace roaresearch\yii2\formgenerator\models;

use yii\{base\Model, db\ActiveQuery};

/**
 * Model class for table `{{%formgenerator_field}}`
 *
 * @property int $id
 * @property int $data_type_id
 * @property string $name
 * @property string $label
 * @property int $created_by
 * @property string $created_at
 * @property int $updated_by
 * @property string $updated_at
 *
 * @property DataType $dataType
 * @property Rules[] $rules
 */
class Field extends \roaresearch\yii2\rmdb\models\Entity
{
    /**
     * @var string full class name of the model used in the relation
     * `getDataType()`.
     */
    protected $dataTypeClass = DataType::class;

    /**
     * @var string full class name of the model used in the relation
     * `getRules()`.
     */
    protected $ruleClass = FieldRule::class;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%formgenerator_field}}';
    }

    /**
     * @inheritdoc
     */
    protected function attributeTypecast(): array
    {
        return parent::attributeTypecast() + [
            'id' => 'integer',
            'data_type_id' => 'integer',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data_type_id', 'name', 'label'], 'required'],
            [['data_type_id'], 'integer'],
            [
                ['data_type_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => DataType::class,
                'targetAttribute' => ['data_type_id' => 'id'],
            ],
            [['name', 'label', 'service'], 'string', 'min' => 4],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge([
            'id' => 'ID',
            'data_type_id' => 'Data Type ID',
            'name' => 'Field name',
            'label' => 'Field label',
        ], parent::attributeLabels());
    }

    /**
     * @return ActiveQuery
     */
    public function getDataType(): ActiveQuery
    {
        return $this->hasOne($this->dataTypeClass, ['id' => 'data_type_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getRules(): ActiveQuery
    {
        return $this->hasMany($this->ruleClass, ['field_id' => 'id'])
            ->inverseOf('field');
    }

    /**
     * @return \yii\validators\Validator[]
     */
    public function buildValidators(Model $model, $attributes)
    {
        $validators = [];

        foreach ($this->rules as $rule) {
            $validators[] = $rule->buildValidator($model, $attributes);
        }

        return $validators;
    }
}
