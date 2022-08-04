<?php

declare(strict_types=1);

namespace User\Di;

final class Bar
{
    public function getFoo(): string
    {
        return 'bar';
    }
}
