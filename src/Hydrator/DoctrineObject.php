<?php
/**
 * @link      http://github.com/zetta-repo/tss-doctrineutil for the canonical source repository
 * @copyright Copyright (c) 2016 Zetta Code
 */

namespace TSS\DoctrineUtil\Hydrator;

class DoctrineObject extends \DoctrineModule\Stdlib\Hydrator\DoctrineObject
{
    /**
     * No handle various type conversions
     *
     * @param  mixed $value
     * @param  string $typeOfField
     * @return mixed
     */
    protected function handleTypeConversions($value, $typeOfField)
    {
        return $value;
    }
}