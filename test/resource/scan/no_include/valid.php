<?php
declare(strict_types=1);

namespace Test\Resource\NoInclude;

class Valid
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
