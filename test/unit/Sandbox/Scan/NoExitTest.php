<?php
declare(strict_types=1);

namespace Test\Unit\Sandbox\Scan;

use GreenLinks\Ogo\Sandbox\Exception\IllegalOperationException;
use GreenLinks\Ogo\Sandbox\Scan\NoExit;

use Test\Unit\UnitTestCase;

class NoExitTest extends UnitTestCase
{
    private NoExit $noExit;

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function it_should_validate_source_that_has_no_exits(): void
    {
        $src = $this->resourceFile('scan/no_exit/valid');

        ($this->noExit)($src);
    }

    /**
     * @test
     */
    public function it_should_invalidate_exits(): void
    {
        $this->expectException(IllegalOperationException::class);

        $src = $this->resourceFile('scan/no_exit/invalid');

        ($this->noExit)($src);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->noExit = new NoExit;
    }
}
