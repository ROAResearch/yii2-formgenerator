<?php

use roaresearch\yii2\rmdb\migrations\CreateEntity;

class m170101_000008_form_solicitude extends CreateEntity
{
    /**
     * @inheritdoc
     */
    public function getTableName(): string
    {
        return 'formgenerator_solicitude';
    }

    /**
     * @inheritdoc
     */
    public function columns(): array
    {
        return [
            'id' => $this->primaryKey(),
            'form_id' => $this->normalKey(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function foreignKeys(): array
    {
        return ['form_id' => 'formgenerator_form'];
    }
}
