<?php

use roaresearch\yii2\rmdb\migrations\CreateEntity;

class m170101_000002_data_type extends CreateEntity
{
    /**
     * @inheritdoc
     */
    public function getTableName(): string
    {
        return 'formgenerator_data_type';
    }

    /**
     * @inheritdoc
     */
    public function columns(): array
    {
        return [
            'id' => $this->primaryKey(),
            'name' => $this->string(32)->notNull()->unique(),
            'label' => $this->text()->notNull(),
            'cast' => $this->string(64)->notNull(),
        ];
    }
}
