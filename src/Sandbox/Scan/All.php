<?php
declare(strict_types=1);

namespace GreenLinks\Ogo\Sandbox\Scan;

use function array_walk;

class All implements Scanner
{
    private array $scanners;

    public function create(): self
    {
        return new self(
            new NoClosingTags,
            new NoEcho,
            new NoExit,
            new NoInclude,
            new NoIncludeOnce,
            new NoRequire,
            new NoRequireOnce,
            new NoVariableFunctions,
            // new OneClassOnly,
            new StartsWithOpenTag
        );
    }

    public function __invoke(string $src): void
    {
        array_walk($this->scanners, function (Scanner $scanner) use ($src): void {
            $scanner($src);
        });
    }

    private function __construct(Scanner ...$scanners)
    {
        $this->scanners = $scanners;
    }
}
