<?php
declare(strict_types=1);

namespace Test\Resource\NoRequire;

require __DIR__ . '/valid.php';

class Invalid
{
    /**
     * @var mixed
     */
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }
}
