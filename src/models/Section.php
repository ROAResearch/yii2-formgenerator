<?php

namespace roaresearch\yii2\formgenerator\models;

use roaresearch\yii2\formgenerator\behaviors\Positionable;
use yii\db\ActiveQuery;

/**
 * Model class for table `{{%formgenerator_form_section}}`
 *
 * @property int $id
 * @property int $form_id
 * @property int $position
 * @property string $name
 * @property string $label
 * @property int $created_by
 * @property string $created_at
 * @property int $updated_by
 * @property string $updated_at
 *
 * @property Form $form
 * @property SectionField[] $sectionFields
 * @property Field[] $fieds
 */
class Section extends \roaresearch\yii2\rmdb\models\Entity
{
    /**
     * @var string full class name of the model used in the relation
     * `getForm()`.
     */
    protected $formClass = Form::class;

    /**
     * @var string full class name of the model used in the relation
     * `getSectionFields()`.
     */
    protected $sectionFieldClass = SectionField::class;

    /**
     * @var string full class name of the model used in the relation
     * `getFields()`.
     */
    protected $fieldClass = Field::class;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%formgenerator_form_section}}';
    }

    /**
     * @inheritdoc
     */
    protected function attributeTypecast(): array
    {
        return parent::attributeTypecast() + [
            'id' => 'integer',
            'form_id' => 'integer',
        ];
    }

    /**
     * @inheritdoc
     */
    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return parent::behaviors() + [
            'position' => [
                'class' => Positionable::class,
                'parentAttribute' => 'form_id',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['form_id', 'name', 'label'], 'required'],
            [['form_id', 'position'], 'integer'],
            [
                ['form_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Form::class,
                'targetAttribute' => ['form_id' => 'id'],
            ],
            [['name', 'label'], 'trim'],
            [['name', 'label'], 'string', 'min' => 6],
            [
                ['name'],
                'unique',
                'targetAttribute' => ['form_id', 'name'],
                'message' => 'Section name "{value}" already in use '
                    . 'for this form.',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge([
            'id' => 'ID',
            'form_id' => 'Form ID',
            'name' => 'Section name',
            'label' => 'Section label',
        ], parent::attributeLabels());
    }

    /**
     * @return ActiveQuery
     */
    public function getForm(): ActiveQuery
    {
        return $this->hasOne($this->formClass, ['id' => 'form_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getSectionFields(): ActiveQuery
    {
        return $this->hasMany($this->sectionFieldClass, ['section_id' => 'id'])
            ->inverseOf('section');
    }

    /**
     * @return ActiveQuery sibling stages for the same workflow
     */
    public function getFields(): ActiveQuery
    {
        return $this->hasMany($this->fieldClass, ['id' => 'field_id'])
            ->via('sectionFields');
    }
}
