<?php

use roaresearch\yii2\rmdb\migrations\CreateEntity;

class m170101_000003_field extends CreateEntity
{
    /**
     * @inheritdoc
     */
    public function getTableName(): string
    {
        return 'formgenerator_field';
    }

    /**
     * @inheritdoc
     */
    public function columns(): array
    {
        return [
            'id' => $this->primaryKey(),
            'data_type_id' => $this->normalKey(),
            'name' => $this->string(32)->unique()->notNull(),
            'label' => $this->text()->notNull(),
            'service' => $this->text()->defaultValue(null)
                ->comment('url for a web service to provide searcheable data'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function foreignKeys(): array
    {
        return ['data_type_id' => 'formgenerator_data_type'];
    }
}
