<?php

namespace roaresearch\yii2\formgenerator\models;

use yii\db\ActiveQuery;

/**
 * Model class for table `{{%formgenerator_form}}`
 *
 * @property int $id
 * @property string $name
 * @property int $created_by
 * @property string $created_at
 * @property int $updated_by
 * @property string $updated_at
 *
 * @property Section[] $sections
 */
class Form extends \roaresearch\yii2\rmdb\models\Entity
{
    /**
     * @var string full class name of the model used in the relation
     * `getSections()`.
     */
    protected $sectionClass = Section::class;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%formgenerator_form}}';
    }

    /**
     * @inheritdoc
     */
    protected function attributeTypecast(): array
    {
        return parent::attributeTypecast() + ['id' => 'integer'];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'min' => 6],
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
            'name' => 'Form name',
        ], parent::attributeLabels());
    }

    /**
     * @return ActiveQuery
     */
    public function getSections(): ActiveQuery
    {
        return $this->hasMany($this->sectionClass, ['form_id' => 'id'])
            ->inverseOf('form');
    }
}
