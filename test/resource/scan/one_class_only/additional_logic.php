<?php
declare(strict_types=1);

namespace Test\Resource\OneClassOnly;

class AdditionalLogic
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

$obj = new AdditionalLogic('VALUE');
