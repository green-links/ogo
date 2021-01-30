<?php
declare(strict_types=1);

namespace GreenLinks\Ogo\Sandbox\Scan;

use GreenLinks\Ogo\Sandbox\Exception\IllegalOperationException;

use function strpos;

/**
 * Ensures that the first characters in the source are "<?php".
 *     "<?" is not allowed.
 */
class StartsWithOpenTag implements Scanner
{
    public function __invoke(string $src): void
    {
        if (0 !== strpos($src, '<?php')) {
            throw new IllegalOperationException(
                'Source must start with an opening tag (short tags not allowed).'
            );
        }
    }
}
