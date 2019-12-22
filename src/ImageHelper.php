<?php
/**
 * Created by PhpStorm.
 * User: tolgakaragol
 * Date: 2019-12-21
 * Time: 23:04
 */

namespace BasicSteganography;

class ImageHelper
{
    /**
     * @param string $path
     * @return resource
     */
    public static function imageCreateFromPath(string $path)
    {
        $extension = getimagesize($path)[2];

        if ($extension !== IMAGETYPE_PNG) {
            throw new \InvalidArgumentException(image_type_to_extension($extension) . ' is not a supported extension');
        }

        $image = imagecreatefrompng($path);

        if ($image === false) {
            throw new \InvalidArgumentException(sprintf('Saving image to %s is failed. something has gone wrong.', $path));
        }

        return $image;
    }

    /**
     * @param $image
     * @param string $path
     */
    public static function imageSave($image, string $path): void
    {
        $extension = getimagesize($path)[2];

        if ($extension !== IMAGETYPE_PNG) {
            throw new \InvalidArgumentException(image_type_to_extension($extension) . ' is not a supported extension');
        }

        $isSuccess = imagepng($image, $path, 0);

        if ($isSuccess === false) {
            throw new \InvalidArgumentException(sprintf('Saving image to %s is failed. something has gone wrong.', $path));
        }
    }
}