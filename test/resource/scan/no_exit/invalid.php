<?php
declare(strict_types=1);

namespace Test\Resource\NoExit;

class Invalid
{
    /**
     * @var mixed
     */
    private $value;

    public function __construct($value)
    {
        $this->value = $value;

        exit;
    }
}
