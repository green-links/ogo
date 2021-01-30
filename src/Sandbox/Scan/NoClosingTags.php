<?php
declare(strict_types=1);

namespace GreenLinks\Ogo\Sandbox\Scan;

use GreenLinks\Ogo\Sandbox\Exception\IllegalOperationException;

use function token_get_all;
use function is_array;

use const T_CLOSE_TAG;

/**
 * Ensures that there are no PHP closing tags in the source.
 */
class NoClosingTags implements Scanner
{
    public function __invoke(string $src): void
    {
        $tokens = token_get_all($src);

        foreach ($tokens as $token) {
            if (is_array($token) && (T_CLOSE_TAG === $token[0])) {
                throw new IllegalOperationException(
                    'Source cannot contain closing tags.'
                );
            }
        }
    }
}
