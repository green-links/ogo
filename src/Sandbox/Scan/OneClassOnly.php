<?php
declare(strict_types=1);

namespace GreenLinks\Ogo\Sandbox\Scan;

use GreenLinks\Ogo\Sandbox\Exception\IllegalOperationException;

use function token_get_all;
use function is_array;

use const T_DOUBLE_COLON;
use const T_WHITESPACE;
use const T_CLASS;

class OneClassOnly implements Scanner
{
    public function __invoke(string $src): void
    {
        $tokens   = @token_get_all($src);
        $found    = false;
        $brackets = 0;
        $done     = false;

        foreach ($tokens as $i => $token) {
            if ($this->isClassDeclaration($tokens, $i)) {
                if ($found) {
                    throw $this->createException();
                }

                $found = true;

                continue;
            }

            if ($token === '{') {
                $brackets++;

                continue;
            }

            if ($token === '}') {
                $done = 0 === --$brackets;

                continue;
            }

            if (is_array($token) && (T_WHITESPACE === $token[0])) {
                continue;
            }

            if ($done) {
                throw $this->createException();
            }
        }

        if (!$found) {
            throw $this->createException();
        }
    }

    private function isClassDeclaration(array $tokens, int $offset): bool
    {
        $token = $tokens[$offset];

        if (is_array($token) && (T_CLASS === $token[0])) {
            if (isset($tokens[$offset - 1])) {
                $previous = $this->previousNonWhitespace($tokens, $offset - 1);

                return !(is_array($previous) && T_DOUBLE_COLON === $previous[0]);
            }

            return true;
        }

        return false;
    }

    /**
     * @return mixed|null
     */
    private function previousNonWhitespace(array $tokens, int $offset)
    {
        for ($i = $offset; $i >= 0; $i--) {
            $token = $tokens[$i];

            if (is_array($token) && (T_WHITESPACE === $token[0])) {
                continue;
            }

            return $token;
        }

        return null;
    }

    private function createException(): IllegalOperationException
    {
        return new IllegalOperationException(
            'Source file must contain a single class and nothing else.'
        );
    }
}
