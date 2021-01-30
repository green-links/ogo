<?php
declare(strict_types=1);

namespace GreenLinks\Ogo\Sandbox\Scan;

use GreenLinks\Ogo\Sandbox\Exception\IllegalOperationException;

use function token_get_all;
use function is_array;

use const T_VARIABLE;

/**
 * Ensures that there are no variables being invoked as functions in the source.
 *     e.g.: $foo()
 */
class NoVariableFunctions implements Scanner
{
    public function __invoke(string $src): void
    {
        $tokens = @token_get_all($src);

        foreach ($tokens as $i => $token) {
            if (
                $this->isVarToken($token)
                && isset($tokens[$i + 1])
                && $this->isBracketToken($tokens[$i + 1])
            ) {
                throw new IllegalOperationException(
                    'Source cannot contain variable functions.'
                );
            }
        }
    }

    /**
     * @param array|string $token
     */
    private function isBracketToken($token): bool
    {
        return '(' === $token;
    }

    /**
     * @param array|string $token
     */
    private function isVarToken($token): bool
    {
        return is_array($token) && (T_VARIABLE === $token[0]);
    }
}
