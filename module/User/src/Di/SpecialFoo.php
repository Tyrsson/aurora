<?php

declare(strict_types=1);

namespace User\Di;

final class SpecialFoo implements FooInterface
{
    public function getFoo(): string
    {
        return 'special_foo';
    }
}
