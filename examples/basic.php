<?php
require __DIR__ . '/../vendor/autoload.php';

use Sodium\Sdk\Addresses;
use Sodium\Sdk\Normalize;

$handle = $argv[1] ?? '@blknoiz06';
echo 'Normalized: ' . Normalize::username($handle) . PHP_EOL;
echo 'Payment: ' . Addresses::getPaymentAddress('twitter', $handle) . PHP_EOL;
