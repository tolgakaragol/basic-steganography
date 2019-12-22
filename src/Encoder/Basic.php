<?php
/**
 * Created by PhpStorm.
 * User: tolgakaragol
 * Date: 2019-12-15
 * Time: 15:27
 */

namespace BasicSteganography\Encoder;

use BasicSteganography\ImageHelper;
use BasicSteganography\Iterator\IteratorFactory;

class Basic
{
    /**
     * @param string $message
     * @param string $path
     * @param string|null $target
     */
    public function encode(string $message, string $path, ?string $target = null): void
    {
        $image = ImageHelper::imageCreateFromPath($path);
        $threePixelIterator = IteratorFactory::createThreePixelIterator($path);

        $messageIterator = IteratorFactory::createMessageIterator($message);

        while ($messageIterator->valid()) {
            $coordinates = $threePixelIterator->current();
            $char = $messageIterator->current();
            $binaries = IteratorFactory::createThreeBinaryIterator($char, $messageIterator->isCurrentLastChar());

            foreach ($coordinates as $coordinate) {
                $color = $this->getEncodedColor($image, $coordinate['x'], $coordinate['y'], $binaries->current());
                imagesetpixel($image, $coordinate['x'], $coordinate['y'], $color);
                $binaries->next();
            }

            $threePixelIterator->next();
            $messageIterator->next();
        }

        ImageHelper::imageSave($image, $target ?? $path);
    }

    /**
     * @param $path
     * @return string
     */
    public function decode($path): string
    {
        $ninthBinary = '0';
        $message = '';

        $image = ImageHelper::imageCreateFromPath($path);
        $threePixelIterator = IteratorFactory::createThreePixelIterator($path);

        while ($ninthBinary === '0') {
            $char = '';
            $coordinates = $threePixelIterator->current();

            foreach ($coordinates as $coordinate) {
                $char .= $this->getBinariesFromPixel($image, $coordinate['x'], $coordinate['y']);
            }

            $ninthBinary = $char[8];
            $threePixelIterator->next();
            $eightBinaries = substr($char, 0, -1);
            $message .= pack('C', bindec($eightBinaries));
        }

        return $message;
    }

    /**
     * @param $image
     * @param int $x
     * @param int $y
     * @param array $binaries
     * @return int
     */
    private function getEncodedColor($image, int $x, int $y, array $binaries): int
    {
        $rgb = imagecolorat($image, $x, $y);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;

        $this->updateColorPartByBinary($r, $binaries[0]);
        $this->updateColorPartByBinary($g, $binaries[1]);
        $this->updateColorPartByBinary($b, $binaries[2]);

        return imagecolorallocate($image, $r, $g, $b);
    }

    /**
     * @param int $colorPart
     * @param string $binary
     */
    private function updateColorPartByBinary(int &$colorPart, string $binary): void
    {
        if (($binary === '0') && $colorPart % 2 === 1) {
            --$colorPart;
        }

        if (($binary === '1') && $colorPart % 2 === 0) {
            ++$colorPart;
        }
    }

    /**
     * @param $image
     * @param $x
     * @param $y
     * @return string
     */
    private function getBinariesFromPixel($image, $x, $y): string
    {
        $rgb = imagecolorat($image, $x, $y);
        $colors = imagecolorsforindex($image, $rgb);

        return ($colors['red'] % 2) . ($colors['green'] % 2) . ($colors['blue'] % 2);
    }
}