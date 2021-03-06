<?php

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace PhpCsFixer\Tests\Linter;

use PhpCsFixer\Linter\UnavailableLinterException;
use PHPUnit\Framework\TestCase;

/**
 * @author Andreas Möller <am@localheinz.com>
 *
 * @internal
 *
 * @covers \PhpCsFixer\Linter\UnavailableLinterException
 */
final class UnavailableLinterExceptionTest extends TestCase
{
    public function testIsRuntimeException()
    {
        $exception = new UnavailableLinterException();

        $this->assertInstanceOf(\RuntimeException::class, $exception);
    }

    public function testConstructorSetsValues()
    {
        $message = 'Never heard of that one, sorry!';
        $code = 9001;
        $previous = new \RuntimeException();

        $exception = new UnavailableLinterException(
            $message,
            $code,
            $previous
        );

        $this->assertSame($message, $exception->getMessage());
        $this->assertSame($code, $exception->getCode());
        $this->assertSame($previous, $exception->getPrevious());
    }
}
