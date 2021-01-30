<?php
declare(strict_types=1);

namespace Test\Unit\Sandbox\Scan;

use GreenLinks\Ogo\Sandbox\Exception\IllegalOperationException;
use GreenLinks\Ogo\Sandbox\Scan\OneClassOnly;

use Test\Unit\UnitTestCase;

class OneClassOnlyTest extends UnitTestCase
{
    private OneClassOnly $oneClassOnly;

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function it_should_validate_a_source_file_that_only_contains_one_class(): void
    {
        $src = $this->resourceFile('scan/one_class_only/valid');

        ($this->oneClassOnly)($src);
    }

    /**
     * @test
     */
    public function it_should_invalidate_a_source_file_that_contains_two_classes(): void
    {
        $this->expectException(IllegalOperationException::class);

        $src = $this->resourceFile('scan/one_class_only/two_classes');

        ($this->oneClassOnly)($src);
    }

    /**
     * @test
     */
    public function it_should_invalidate_a_source_file_that_contains_an_additional_function(): void
    {
        $this->expectException(IllegalOperationException::class);

        $src = $this->resourceFile('scan/one_class_only/additional_function');

        ($this->oneClassOnly)($src);
    }

    /**
     * @test
     */
    public function it_should_invalidate_a_source_file_that_contains_additional_logic(): void
    {
        $this->expectException(IllegalOperationException::class);

        $src = $this->resourceFile('scan/one_class_only/additional_logic');

        ($this->oneClassOnly)($src);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->oneClassOnly = new OneClassOnly;
    }
}
