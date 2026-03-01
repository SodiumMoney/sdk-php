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

    public function testPaymentBlknoiz06(): void
    {
        $this->assertSame(
            'HPT9k5YWkKNQcZGewGmABjRu8A5Bnem6VsBmNrNsSgyd',
            Addresses::getPaymentAddress('twitter', '@blknoiz06')
        );
    }

    public function testPaymentAlias(): void
    {
        $a = Addresses::getPaymentAddress('twitter', '@blknoiz06');
        $b = Addresses::getPaymentAddress('twitter', '@BLKNOIZ06');
        $this->assertSame($a, $b);
    }
}
