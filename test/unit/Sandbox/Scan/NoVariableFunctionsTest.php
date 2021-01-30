<?php
declare(strict_types=1);

namespace Test\Unit\Sandbox\Scan;

use GreenLinks\Ogo\Sandbox\Exception\IllegalOperationException;
use GreenLinks\Ogo\Sandbox\Scan\NoVariableFunctions;

use Test\Unit\UnitTestCase;

class NoVariableFunctionsTest extends UnitTestCase
{
    private NoVariableFunctions $variableFunctions;

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function it_should_validate_source_that_has_no_variable_functions(): void
    {
        $src = $this->resourceFile('scan/no_variable_functions/valid');

        ($this->variableFunctions)($src);
    }

    /**
     * @test
     */
    public function it_should_invalidate_variable_functions(): void
    {
        $this->expectException(IllegalOperationException::class);

        $src = $this->resourceFile('scan/no_variable_functions/invalid');

        ($this->variableFunctions)($src);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->variableFunctions = new NoVariableFunctions;
    }
}
