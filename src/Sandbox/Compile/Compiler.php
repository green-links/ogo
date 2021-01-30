<?php
declare(strict_types=1);

namespace GreenLinks\Ogo\Sandbox\Compile;

interface Compiler
{
    public function __invoke(string $src): string;
}
