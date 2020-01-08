<?php

use roaresearch\yii2\rmdb\migrations\CreateEntity;

class m170101_000009_form_solicitude_value extends CreateEntity
{
    /**
     * @inheritdoc
     */
    public function getTableName(): string
    {
        return 'formgenerator_solicitude_value';
    }

    /**
     * @inheritdoc
     */
    public function columns(): array
    {
        return [
            'solicitude_id' => $this->normalKey(),
            'section_id' => $this->normalKey(),
            'field_id' => $this->normalKey(),
            'value' => $this->string(128),
        ];
    }

    /**
     * @inheritdoc
     */
    public function foreignKeys(): array
    {
        return [
            'solicitude_id' => 'formgenerator_solicitude',
            'field' => [
                'table' => 'formgenerator_form_section_field',
                'columns' => [
                    'section_id' => 'section_id',
                    'field_id' => 'field_id',
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function compositePrimaryKeys(): array
    {
        return [
            'solicitude_id',
            'section_id',
            'field_id',
        ];
    }
}
