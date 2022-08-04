<?php

declare(strict_types=1);

namespace User\Di;

use User\Di\FooInterface;

final class Foo implements FooInterface
{
    public function getFoo(): string
    {
        return 'foo';
    }
}
