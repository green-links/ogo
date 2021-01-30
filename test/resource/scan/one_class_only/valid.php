<?php
declare(strict_types=1);

namespace Test\Resource\OneClassOnly;

class Valid
{
    /**
     * @var mixed
     */
    private $value;

    public function __construct()
    {
        $this->value = self :: class;
    }
}
