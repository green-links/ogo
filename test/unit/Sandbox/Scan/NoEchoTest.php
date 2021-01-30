<?php
declare(strict_types=1);

namespace Test\Unit\Sandbox\Scan;

use GreenLinks\Ogo\Sandbox\Exception\IllegalOperationException;
use GreenLinks\Ogo\Sandbox\Scan\NoEcho;

use Test\Unit\UnitTestCase;

class NoEchoTest extends UnitTestCase
{
    private NoEcho $noEcho;

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function it_should_validate_source_that_has_no_echos(): void
    {
        $src = $this->resourceFile('scan/no_echo/valid');

        ($this->noEcho)($src);
    }

    /**
     * @test
     */
    public function it_should_invalidate_echos(): void
    {
        $this->expectException(IllegalOperationException::class);

        $src = $this->resourceFile('scan/no_echo/invalid');

        ($this->noEcho)($src);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->noEcho = new NoEcho;
    }
}
