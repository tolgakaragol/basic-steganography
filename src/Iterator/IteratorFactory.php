<?php
/**
 * Created by PhpStorm.
 * User: tolgakaragol
 * Date: 2019-12-21
 * Time: 23:38
 */

namespace BasicSteganography\Iterator;


class IteratorFactory
{
    public static function createThreePixelIterator(string $path): ThreePixelIterator
    {
        [$width, $height]   = getimagesize($path);
        $pixels = [];

        for($y = 1; $y <= $height; $y++) {
            for($x = 1; $x <= $width; $x++) {
                $pixels[] = [
                    'x' => $x,
                    'y' => $y,
                ];
            }
        }

        return new ThreePixelIterator($pixels);
    }

    public static function createMessageIterator(string $message): MessageIterator
    {
        return new MessageIterator($message);
    }

    /**
     * @param string $char
     * @param bool $isLastChar
     * @return ThreeBinaryIterator
     */
    public static function createThreeBinaryIterator(string $char, bool $isLastChar): ThreeBinaryIterator
    {
        $asciiCode = sprintf('%08d', decbin(ord($char)));

        $nineBinary = $asciiCode . (int) $isLastChar;

        $binaries = str_split($nineBinary);

        return new ThreeBinaryIterator($binaries);
    }
}