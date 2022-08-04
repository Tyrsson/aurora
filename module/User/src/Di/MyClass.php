<?php

declare(strict_types=1);

namespace User\Di;

final class MyClass
{
    /** @var string $foo */
    public $foo;
    public function __construct(FooInterface $foo)
    {
        $this->foo = $foo;
    }
}
