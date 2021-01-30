<?php
declare(strict_types=1);

namespace Test\Resource\OneClassOnly;

class TwoClassesOne
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

class TwoClassesTwo
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
