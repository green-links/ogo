<?php
declare(strict_types=1);

namespace Test\Unit;

use PHPUnit\Framework\TestCase as BaseTestCase;

use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophet;

use RuntimeException;

use function file_get_contents;
use function sprintf;

abstract class UnitTestCase extends BaseTestCase
{
    private Prophet $prophet;

    protected function resourceFile(string $path): string
    {
        $fullPath = sprintf(__DIR__ . '/../resource/%s.php', $path);
        $src      = @file_get_contents($fullPath);

        if (false === $src) {
            throw new RuntimeException(
                sprintf('Could not load source file: "%s".', $fullPath)
            );
        }

        return $src;
    }

    protected function newMock(string $classPath): ObjectProphecy
    {
        return $this->prophet->prophesize($classPath);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->prophet = new Prophet;
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->prophet->checkPredictions();
    }
}
