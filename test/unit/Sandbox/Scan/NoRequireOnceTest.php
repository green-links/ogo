<?php
declare(strict_types=1);

namespace Test\Unit\Sandbox\Scan;

use GreenLinks\Ogo\Sandbox\Exception\IllegalOperationException;
use GreenLinks\Ogo\Sandbox\Scan\NoRequireOnce;

use Test\Unit\UnitTestCase;

class NoRequireOnceTest extends UnitTestCase
{
    private NoRequireOnce $noRequireOnce;

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function it_should_validate_source_that_has_no_require_once(): void
    {
        $src = $this->resourceFile('scan/no_require_once/valid');

        ($this->noRequireOnce)($src);
    }

    /**
     * @test
     */
    public function it_should_invalidate_require_once(): void
    {
        $this->expectException(IllegalOperationException::class);

        $src = $this->resourceFile('scan/no_require_once/invalid');

        ($this->noRequireOnce)($src);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->noRequireOnce = new NoRequireOnce;
    }
}
