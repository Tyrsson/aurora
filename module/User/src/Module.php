<?php

declare(strict_types=1);

namespace User;

use Laminas\Di\InjectorInterface;
use Laminas\Mvc\MvcEvent;
use Laminas\View\Resolver\TemplateMapResolver;
use User\Di\MyFactoryExample;
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
        $templateMapResolver = $app->getServiceManager()->get(TemplateMapResolver::class);
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
        // returns Laminas\ServiceManager\ServiceManager
        $container = $di->getContainer();
        // get $factoryExample from the container
        $factoryExample = $container->get(MyFactoryExample::class);
        // create an instance
        $createFactoryExample = $di->create(MyFactoryExample::class);
        if ($factoryExample === $createFactoryExample) {
            $instanceOfA = $di->create('MyClass.A');
        } else {
            /**
             * we get an instance of MyClass.B because
             * $factoryExample and $createFactoryExample are different instances
             */
            $instanceOfB = $di->create('MyClass.B');
        }
        $anotherFactoryExample = $container->get(MyFactoryExample::class);
        if ($factoryExample === $anotherFactoryExample) {
            /**
             * We get an instance of MyClass.A because
             * because when pulled from the ServiceManager
             * you get a shared instance by default, which means the
             * object is created exactly once.
             */
            $instanceOfA = $di->create('MyClass.A');
        } else {
            $instanceOfB = $di->create('MyClass.B');
        }
    }
}
