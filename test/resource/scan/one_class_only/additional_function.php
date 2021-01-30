<?php
declare(strict_types=1);

namespace Test\Resource\OneClassOnly;

class AdditionalFunction
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

function additional_function()
{
    return 'something';
}
