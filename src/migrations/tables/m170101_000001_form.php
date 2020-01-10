<?php

use roaresearch\yii2\rmdb\migrations\CreateEntity;

class m170101_000001_form extends CreateEntity
{
    /**
     * @inheritdoc
     */
    public function getTableName(): string
    {
        return 'formgenerator_form';
    }

    /**
     * @inheritdoc
     */
    public function columns(): array
    {
        return [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->unique()->notNull(),
        ];
    }
}
