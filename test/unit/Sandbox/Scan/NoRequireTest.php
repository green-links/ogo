<?php
declare(strict_types=1);

namespace Test\Unit\Sandbox\Scan;

use GreenLinks\Ogo\Sandbox\Exception\IllegalOperationException;
use GreenLinks\Ogo\Sandbox\Scan\NoRequire;

use Test\Unit\UnitTestCase;

class NoRequireTest extends UnitTestCase
{
    private NoRequire $noRequire;

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function it_should_validate_source_that_has_no_requires(): void
    {
        $src = $this->resourceFile('scan/no_require/valid');

        ($this->noRequire)($src);
    }

    /**
     * @test
     */
    public function it_should_invalidate_requires(): void
    {
        $this->expectException(IllegalOperationException::class);

        $src = $this->resourceFile('scan/no_require/invalid');

        ($this->noRequire)($src);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->noRequire = new NoRequire;
    }
}
