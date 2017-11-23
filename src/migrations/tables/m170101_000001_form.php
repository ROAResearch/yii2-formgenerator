<?php

class m170101_000001_form
    extends tecnocen\rmdb\migrations\CreatePivot
{
    /**
     * @inheritdoc
     */
    public function getTableName()
    {
        return 'formgenerator_form';
    }

    /**
     * @inheritdoc
     */
    public function columns()
    {
        return [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->unique()->notNull(),
        ];
    }
}
