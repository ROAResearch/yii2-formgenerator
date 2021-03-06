<?php

use roaresearch\yii2\rmdb\migrations\CreateEntity;

class m170101_000006_form_section extends CreateEntity
{
    /**
     * @inheritdoc
     */
    public function getTableName(): string
    {
        return 'formgenerator_form_section';
    }

    /**
     * @inheritdoc
     */
    public function columns(): array
    {
        return [
            'id' => $this->primaryKey(),
            'position' => $this->integer()->unsigned()->notNull(),
            'form_id' => $this->normalKey(),
            'name' => $this->string(32)->notNull(),
            'label' => $this->text()->notNull(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function foreignKeys(): array
    {
        return ['form_id' => 'formgenerator_form'];
    }

    /**
     * @inheritdoc
     */
    public function compositeUniqueKeys(): array
    {
        return [
            'name' => ['form_id', 'name'],
            'position' => ['form_id', 'position'],
        ];
    }
}
