<?php
declare(strict_types=1);

namespace Test\Unit\Sandbox\Scan;

use GreenLinks\Ogo\Sandbox\Exception\IllegalOperationException;
use GreenLinks\Ogo\Sandbox\Scan\NoInclude;

use Test\Unit\UnitTestCase;

class NoIncludeTest extends UnitTestCase
{
    private NoInclude $noInclude;

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function it_should_validate_source_that_has_no_includes(): void
    {
        $src = $this->resourceFile('scan/no_include/valid');

        ($this->noInclude)($src);
    }

    /**
     * @test
     */
    public function it_should_invalidate_includes(): void
    {
        $this->expectException(IllegalOperationException::class);

        $src = $this->resourceFile('scan/no_include/invalid');

        ($this->noInclude)($src);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->noInclude = new NoInclude;
    }
}
