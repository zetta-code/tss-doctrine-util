<?php
/**
 * @link      http://github.com/zetta-repo/tss-doctrineutil for the canonical source repository
 * @copyright Copyright (c) 2016 Zetta Code
 */

namespace TSS\DoctrineUtil;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

class ConfigProvider implements ConfigProviderInterface
{
    /**
     * Return configuration for this component.
     *
     * @return array
     */
    public function __invoke()
    {
        return $this->getConfig();
    }

    public function getConfig()
    {
        return [
            'doctrine' => [
                'driver' => [
                    'tss_doctrineutil_entities' => [
                        'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                        'cache' => 'array',
                        'paths' => [__DIR__ . '/Entity'],
                    ],
                    'orm_default' => [
                        'drivers' => [
                            'TSS\DoctrineUtil' => 'tss_doctrineutil_entities',
                        ],
                    ],
                ],
            ],
        ];
    }
}
