<?php

declare(strict_types=1);

namespace User;

use Laminas\Di\InjectorInterface;
use Laminas\Mvc\MvcEvent;
use Laminas\View\Resolver\TemplateMapResolver;
use User\Listener\LayoutListener;

final class Module
{
    public function getConfig(): array
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function onBootstrap(MvcEvent $e): void
    {
        $app = $e->getApplication();
        /** @var TemplateMapResolver $templateMapResolver */
        $templateMapResolver = $app->getServiceManager()->get('ViewTemplateMapResolver');
        // Create and register layout listener
        $listener = new LayoutListener($templateMapResolver);
        $listener->attach($app->getEventManager());
        /**
         * the following is the only explicit use of Di in the entire application,
         * but its important to note that its automatically creating an instance
         * of the AuthenticationService class via the autowiring Factory simply
         * because Laminas\Di in loaded in the /config/modules.config.php file.
         */
        $di = $app->getServiceManager()->get(InjectorInterface::class);
        // the following is an instance of the class as defined in the configuration file
        $instance = $di->create(Di\MyClass::class);
    }
}
