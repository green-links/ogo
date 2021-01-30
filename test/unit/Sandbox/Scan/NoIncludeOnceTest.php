<?php
declare(strict_types=1);

namespace Test\Unit\Sandbox\Scan;

use GreenLinks\Ogo\Sandbox\Exception\IllegalOperationException;
use GreenLinks\Ogo\Sandbox\Scan\NoIncludeOnce;

use Test\Unit\UnitTestCase;

class NoIncludeOnceTest extends UnitTestCase
{
    private NoIncludeOnce $noIncludeOnce;

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function it_should_validate_source_that_has_no_include_once(): void
    {
        $src = $this->resourceFile('scan/no_include_once/valid');

        ($this->noIncludeOnce)($src);
    }

    /**
     * @test
     */
    public function it_should_invalidate_include_once(): void
    {
        $this->expectException(IllegalOperationException::class);

        $src = $this->resourceFile('scan/no_include_once/invalid');

        ($this->noIncludeOnce)($src);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->noIncludeOnce = new NoIncludeOnce;
    }
}
