<?php

declare(strict_types=1);

namespace User\Di;

use Laminas\EventManager\EventManager;
use Laminas\EventManager\EventManagerAwareInterface;
use Laminas\EventManager\EventManagerInterface;

final class MyFactoryExample implements EventManagerAwareInterface
{
    /** @var EventManager $eventManager */
    protected $eventManager;

    public function __construct(EventManagerInterface $eventManager)
    {
        $this->eventManager = $eventManager;
    }

    public function setEventManager(?EventManagerInterface $eventManager = null): void
    {
        $this->eventManager = $eventManager;
    }

    public function getEventManager(): EventManagerInterface
    {
        return $this->eventManager;
    }
}
