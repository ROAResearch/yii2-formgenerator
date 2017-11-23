<?php

namespace tecnocen\formgenerator\models;

use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\validators\Validator;

/**
 * Model class for table `{{%formgenerator_field_rule}}`
 *
 * @property integer $id
 * @property integer $field_id
 * @property string $class
 *
 * @property Field $field
 * @property FieldRuleProperty[] $properties
 */
class FieldRule extends \tecnocen\rmdb\models\Entity
{
    /**
     * @var string full class name of the model used in the relation
     * `getField()`.
     */
    protected $fieldClass = Field::class;

    /**
     * @var string full class name of the model used in the relation
     * `getProperties()`.
     */
    protected $propertyClass = FieldRuleProperty::class;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%formgenerator_field_rule}}';
    }

    /**
     * @inheritdoc
     */
    protected function attributeTypecast()
    {
        return parent::attributeTypecast() + [
            'id' => 'integer',
            'field_id' => 'integer',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['field_id', 'class'], 'required'],
            [['field_id'], 'integer'],
            [
                ['field_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Field::class,
                'targetAttribute' => ['field_id' => 'id'],
            ],
            [['class'], 'string', 'min' => 2],
            // todo check its a valid validator class
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge([
            'field_id' => 'Field ID',
            'class' => 'Validator Class',
        ], parent::attributeLabels());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getField()
    {
        return $this->hasOne($this->fieldClass, ['id' => 'field_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperties()
    {
        return $this->hasMany($this->propertyClass, ['rule_id' => 'id'])
            ->inverseOf('rule');
    }

    public function buildValidator(Model $model, $attributes)
    {
        return Validator::createValidator(
            $this->class,
            $model,
            (array) $attributes,
            ArrayHelper::map($this->properties, 'property', 'value')
        );
    }
}
