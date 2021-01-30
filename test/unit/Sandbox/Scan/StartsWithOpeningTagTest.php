<?php
declare(strict_types=1);

namespace Test\Unit\Sandbox\Scan;

use GreenLinks\Ogo\Sandbox\Exception\IllegalOperationException;
use GreenLinks\Ogo\Sandbox\Scan\StartsWithOpenTag;

use Test\Unit\UnitTestCase;

class StartsWithOpeningTagTest extends UnitTestCase
{
    private StartsWithOpenTag $startsWithOpenTag;

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function it_should_validate_source_that_starts_with_an_opening_tag(): void
    {
        $src = $this->resourceFile('scan/starts_with_opening_tag/valid');

        ($this->startsWithOpenTag)($src);
    }

    /**
     * @test
     */
    public function it_should_invalidate_source_that_does_not_start_an_with_opening_tag(): void
    {
        $this->expectException(IllegalOperationException::class);

        $src = $this->resourceFile('scan/starts_with_opening_tag/invalid');

        ($this->startsWithOpenTag)($src);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->startsWithOpenTag = new StartsWithOpenTag;
    }
}
