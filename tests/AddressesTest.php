<?php
declare(strict_types=1);

namespace Sodium\Sdk\Tests;

use PHPUnit\Framework\TestCase;
use Sodium\Sdk\Addresses;

final class AddressesTest extends TestCase
{
    public function testConfig(): void
    {
        $this->assertSame('3WYJaf1ocPSbQAMjFhka5t8iusdH11Atw6FcxeuVYsTw', Addresses::getConfigAddress('mainnet'));
    }
}
