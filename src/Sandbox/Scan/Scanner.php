<?php
declare(strict_types=1);

namespace GreenLinks\Ogo\Sandbox\Scan;

interface Scanner
{
    public function __invoke(string $src): void;
}
