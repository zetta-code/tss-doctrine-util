<?php
/**
 * @link      http://github.com/zetta-repo/tss-doctrineutil for the canonical source repository
 * @copyright Copyright (c) 2016 Zetta Code
 */

namespace TSS\DoctrineUtil\Types;

use Jenssegers\Date\Date,
    Doctrine\DBAL\Platforms\AbstractPlatform,
    Doctrine\DBAL\Types\DateTimeType;

class JenssegersDateTimeType extends DateTimeType
{
    const JENSSEGERSDATETIME = 'jenssegersdatetime';

    public function getName()
    {
        return static::JENSSEGERSDATETIME;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $result = parent::convertToPHPValue($value, $platform);

        if ($result instanceof \DateTime) {
            return Date::instance($result);
        }

        return $result;
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        return true;
    }
}
