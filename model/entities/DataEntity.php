<?php

namespace app\model\entities;

use app\model\models;

/**
 * Class DataEntity
 * @package app\models
 */
abstract class DataEntity extends models
{
    public static function getPersonalProperties()
    {
        return ['isNew'];
    }
}