<?php

use roaresearch\yii2\rmdb\migrations\CreateEntity;

class m170101_000007_form_section_field extends CreateEntity
{
    /**
     * @inheritdoc
     */
    public function getTableName(): string
    {
        return 'formgenerator_form_section_field';
    }

    /**
     * @inheritdoc
     */
    public function columns(): array
    {
        return [
            'section_id' => $this->normalKey(),
            'field_id' => $this->normalKey(),
            'position' => $this->integer()->unsigned()->notNull(),
            'label' => $this->text()->defaultValue(null)
                ->comment('When not set it will use the label on field.'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function foreignKeys(): array
    {
        return [
            'section_id' => 'formgenerator_form_section',
            'field_id' => 'formgenerator_field',
        ];
    }

    /**
     * @inheritdoc
     */
    public function compositePrimaryKeys(): array
    {
        return ['section_id', 'field_id'];
    }

    /**
     * @inheritdoc
     */
    public function compositeUniqueKeys(): array
    {
        return ['position' => ['section_id', 'position']];
    }
}
