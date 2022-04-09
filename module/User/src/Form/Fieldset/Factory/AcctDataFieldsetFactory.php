<?php

declare(strict_types=1);

namespace User\Form\Fieldset\Factory;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;
use User\Form\Fieldset\AcctDataFieldset;

class AcctDataFieldsetFactory implements FactoryInterface
{
    /**
     * @param string $requestedName
     * @param null|mixed[] $options
     */
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null): AcctDataFieldset
    {
        return new AcctDataFieldset($options);
    }
}
