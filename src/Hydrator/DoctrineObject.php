<?php
/**
 * @link      http://github.com/zetta-repo/tss-doctrineutil for the canonical source repository
 * @copyright Copyright (c) 2016 Zetta Code
 */

namespace TSS\DoctrineUtil\Hydrator;

use Jenssegers\Date\Date;

class DoctrineObject extends \DoctrineModule\Stdlib\Hydrator\DoctrineObject
{
    /**
     * Handle various type conversions that should be supported natively by Doctrine (like DateTime)
     *
     * @param  mixed $value
     * @param  string $typeOfField
     * @return Date
     */
    protected function handleTypeConversions($value, $typeOfField)
    {

        switch($typeOfField) {
            case 'datetimetz':
            case 'datetime':
            case 'time':
            case 'date':
                if ('' === $value) {
                    return null;
                }

                if (is_int($value)) {
                    $value = Date::createFromTimestamp($value);
                } elseif (is_string($value)) {
                    $value = Date::createFromFormat('d/M/Y', $value);
                }
                break;
            default:
        }

        return $value;
    }
}