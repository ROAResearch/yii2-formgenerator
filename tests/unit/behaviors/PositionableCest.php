<?php

use roaresearch\yii2\formgenerator\{behaviors\Positionable, models\Form};
use yii\{base\Component, base\InvalidConfigException, db\ActiveRecord};

class PositionableCest
{
    protected $model;

    public function attach(UnitTester $I)
    {
        $I->expectThrowable(
            new InvalidConfigException(
                Positionable::class . '::$parentAttribute must be set.'
            ),
            function () {
                $model = new Component();
                $model->attachBehavior('positionable', new Positionable());
            }
        );

        $I->expectThrowable(
            new InvalidConfigException(
                Positionable::class
                    . '::$owner must extend '
                    . ActiveRecord::class
            ),
            function () {
                $model = new Component();
                $model->attachBehavior('positionable', new Positionable([
                    'parentAttribute' => 'none',
                ]));
            }
        );

        $I->expectThrowable(
            new InvalidConfigException(
                Form::class . '::$none is not an attribute.'
            ),
            function () {
                $model = new Form();
                $model->attachBehavior('positionable', new Positionable([
                    'parentAttribute' => 'none',
                ]));
            }
        );

        $I->expectThrowable(
            new InvalidConfigException(
                Form::class . '::$position is not an attribute.'
            ),
            function () {
                $model = new Form();
                $model->attachBehavior('positionable', new Positionable([
                    'parentAttribute' => 'id',
                ]));
            }
        );
    }
}
