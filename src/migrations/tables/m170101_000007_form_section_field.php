<?php

class m170101_000007_form_section_field
    extends tecnocen\rmdb\migrations\CreatePivot
{
    /**
     * @inheritdoc
     */
    public function getTableName()
    {
        return 'formgenerator_form_section_field';
    }

    /**
     * @inheritdoc
     */
    public function columns()
    {
        return [
            'section_id' => $this->normalKey(),
            'field_id' => $this->normalKey(),
            'label' => $this->string(64)->notNull(),            
        ];
    }

    /**
     * @inheritdoc
     */
    public function foreignKeys()
    {
        return [
            'section_id' => 'formgenerator_form_section',
            'field_id' => 'formgenerator_field',
        ];
    }

    /**
     * @inheritdoc
     */
    public function compositePrimaryKeys()
    {
        return ['section_id', 'field_id'];
    }
}
