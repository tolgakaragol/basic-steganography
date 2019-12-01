<?php
/**
 * Created by PhpStorm.
 * User: tolgakaragol
 * Date: 2019-12-01
 * Time: 15:46
 */

namespace BasicSteganographyTest;

use PHPUnit\Framework\TestCase;

class BasicAlgorithmTest extends TestCase
{
    private const DECODE_SECRET = 'evil morty';

    public function testEncode()
    {
        $steganog = new BacicSteganog();
        $steganog->encode('SECRET DATA', __DIR__ . 'data/evil_morty.png', __DIR__ . 'data/encode_test_evil_morty.png');

        /** @todo: assert here. */
    }

    public function testDecode()
    {
        $steganog = new BacicSteganog();
        $secret = $steganog->decode(__DIR__ . 'data/encoded_evil_morty.png');

        $this->assertSame($secret, self::DECODE_SECRET);
    }


}