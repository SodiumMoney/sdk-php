<?php
declare(strict_types=1);

namespace Sodium\Sdk\Tests;

use PHPUnit\Framework\TestCase;
use Sodium\Sdk\Normalize;

final class NormalizeTest extends TestCase
{
    public function testStripAt(): void
    {
        $this->assertSame('blknoiz06', Normalize::username('@blknoiz06'));
        $this->assertSame('blknoiz06', Normalize::username('@BLKNOIZ06'));
    }

    public function testUnicode(): void
    {
        $this->assertSame('ansem 🐂🀄️', Normalize::username('Ansem 🐂🀄️'));
    }
}
