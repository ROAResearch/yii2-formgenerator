<?php

use roaresearch\yii2\rmdb\migrations\CreateEntity;

class m170101_000004_field_rule extends CreateEntity
{
    /**
     * @inheritdoc
     */
    public function getTableName(): string
    {
        return 'formgenerator_field_rule';
    }

    /**
     * @inheritdoc
     */
    public function columns(): array
    {
        return [
            'id' => $this->primaryKey(),
            'field_id' => $this->normalKey(),
            'rule_class' => $this->string(64)->notNull(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function foreignKeys(): array
    {
        return ['field_id' => 'formgenerator_field'];
    }
}
