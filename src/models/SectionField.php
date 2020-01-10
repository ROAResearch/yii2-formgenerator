<?php

namespace roaresearch\yii2\formgenerator\models;

use roaresearch\yii2\formgenerator\behaviors\Positionable;
use Yii;
use yii\db\ActiveQuery;

/**
 * Model class for table `{{%formgenerator_form_section_field}}`
 *
 * @property int $section_id
 * @property int $field_id
 * @property int $position
 * @property string $label
 * @property int $created_by
 * @property string $created_at
 * @property int $updated_by
 * @property string $updated_at
 *
 * @property Section $section
 * @property Field $field
 * @property SolicitudeValue $solicitudeValues
 * @property array $solicitudeValuesData
 * @property array $solicitudeValuesDataDetail
 */
class SectionField extends \roaresearch\yii2\rmdb\models\Entity
{
    /**
     * @var string full class name of the model used in the relation
     * `getSection()`.
     */
    protected $sectionClass = Section::class;

    /**
     * @var string full class name of the model used in the relation
     * `getField()`.
     */
    protected $fieldClass = Field::class;

    /**
     * @var string full class name of the model used in the relation
     * `getSolicitudeValues()`.
     */
    protected $solicitudeValueClass = SolicitudeValue::class;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%formgenerator_form_section_field}}';
    }

    /**
     * @inheritdoc
     */
    protected function attributeTypecast(): array
    {
        return parent::attributeTypecast() + [
            'section_id' => 'integer',
            'field_id' => 'integer',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['section_id', 'field_id'], 'required'],
            [['section_id', 'field_id', 'position'], 'integer'],
            [
                ['section_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Section::class,
                'targetAttribute' => ['section_id' => 'id'],
            ],
            [
                ['field_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Field::class,
                'targetAttribute' => ['field_id' => 'id'],
                'message' => 'The field does not exists.',
            ],
            [['label'], 'trim'],
            [['label'], 'string'],
            [
                ['field_id'],
                'unique',
                'targetAttribute' => ['section_id', 'field_id'],
                'message' => 'Field already associated to the section.',
            ],
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
                'parentAttribute' => 'section_id',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge([
            'section_id' => 'Section ID',
            'field_id' => 'Field ID',
            'label' => 'label',
        ], parent::attributeLabels());
    }

    /**
     * @return ActiveQuery
     */
    public function getSection(): ActiveQuery
    {
        return $this->hasOne($this->sectionClass, ['id' => 'section_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getField(): ActiveQuery
    {
        return $this->hasOne($this->fieldClass, ['id' => 'field_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getSolicitudeValues(): ActiveQuery
    {
        return $this->hasMany($this->solicitudeValueClass, [
            'field_id' => 'field_id',
            'section_id' => 'section_id',
        ])->inverseOf('sectionField');
    }

    /**
     * @return ActiveQuery
     */
    public function getSolicitudeValuesDetail(): ActiveQuery
    {
        return Yii::configure(
            $this->getSolicitudeValues(),
            ['multiple' => false]
        )
            ->select([
                'count' => 'count(value)',
                'countDistinct' => 'count(distinct value)',
            ])
            ->groupBy(['section_id', 'field_id'])
            ->inverseOf(null)
            ->asArray();
    }
}
