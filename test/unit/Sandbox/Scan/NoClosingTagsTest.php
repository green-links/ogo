<?php
declare(strict_types=1);

namespace Test\Unit\Sandbox\Scan;

use GreenLinks\Ogo\Sandbox\Exception\IllegalOperationException;
use GreenLinks\Ogo\Sandbox\Scan\NoClosingTags;

use Test\Unit\UnitTestCase;

class NoClosingTagsTest extends UnitTestCase
{
    private NoClosingTags $noClosingTags;

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function it_should_validate_source_that_has_no_closing_tags(): void
    {
        $src = $this->resourceFile('scan/no_closing_tags/valid');

        ($this->noClosingTags)($src);
    }

    /**
     * @test
     */
    public function it_should_invalidate_closing_tags(): void
    {
        $this->expectException(IllegalOperationException::class);

        $src = $this->resourceFile('scan/no_closing_tags/invalid');

        ($this->noClosingTags)($src);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->noClosingTags = new NoClosingTags;
    }
}
