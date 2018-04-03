<?php

namespace tecnocen\formgenerator\dataTypes;

use yii\base\Model;
use yii\helpers\ArrayHelper;

class IntegerDataType implements DataTypeInterface
{
    public function __construct()
    {
    }

    public function load(Model $model, $data, $formName = null)
    {
        if ('' === $formName) {
            return ArrayHelper::getValue($data, 'raw');
        }
        if ($formName === null) {
            $formName = $model->formName();
        }
        return ArrayHelper::getValue($data, $formName . '.raw');
    }

    public function store(Model $model, $value)
    {
        if (null === $raw) {
            return null;
        }

        return (int)$value;
    }

    public function read($raw)
    {
        if (null === $raw) {
            return null;
        }

        return (int)$raw;
    }
}
