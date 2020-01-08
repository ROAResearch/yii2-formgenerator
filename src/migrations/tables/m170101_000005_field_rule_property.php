<?php

use roaresearch\yii2\rmdb\migrations\CreateEntity;

class m170101_000005_field_rule_property extends CreateEntity
{
    /**
     * @inheritdoc
     */
    public function getTableName(): string
    {
        return 'formgenerator_field_rule_property';
    }

    /**
     * @inheritdoc
     */
    public function columns(): array
    {
        return [
            'rule_id' => $this->normalKey(),
            'property' => $this->string(64)->notNull(),
            'value' => $this->string(64)->notNull(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function foreignKeys(): array
    {
        return ['rule_id' => 'formgenerator_field_rule'];
    }

    /**
     * @inheritdoc
     */
    public function compositePrimaryKeys(): array
    {
        return ['rule_id', 'property'];
    }
}
