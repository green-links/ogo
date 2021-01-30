<?php
declare(strict_types=1);

namespace Test\Resource\NoVariableFunctions;

use function call_user_func;

class Invalid
{
    public function __construct(callable $func)
    {
        $func();
    }
}
