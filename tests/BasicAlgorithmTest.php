<?php
/**
 * Created by PhpStorm.
 * User: tolgakaragol
 * Date: 2019-12-01
 * Time: 15:46
 */

namespace BasicSteganographyTest;

use BasicSteganography\Encoder\Basic;
use PHPUnit\Framework\TestCase;

class BasicAlgorithmTest extends TestCase
{
    private const SECRET = 'evil morty';

    /**
     * @param array $pixels
     * @dataProvider getPixelData
     */
    public function testEncode(array $pixels): void
    {
        $basic = new Basic();

        $basic->encode(self::SECRET, __DIR__ . '/data/evil_morty.png');

        $image = imagecreatefrompng(__DIR__ . '/data/evil_morty.png');

        foreach ($pixels as $data) {
            $x = $data['x'];
            $y = $data['y'];
            $expected = $data['expected'];

            $color = imagecolorat($image, $x, $y);
            $colors = imagecolorsforindex($image, $color);

            $this->assertSame($expected['r'], $colors['red']);
            $this->assertSame($expected['g'], $colors['green']);
            $this->assertSame($expected['b'], $colors['blue']);
        }
    }

    public function testDecode()
    {
        $basic = new Basic();

        $secret = $basic->decode(__DIR__ . '/data/evil_morty.png');

        $this->assertSame(self::SECRET, $secret);
    }

    /**
     * @return array
     */
    public function getPixelData(): array
    {
        return [
            'pixels' =>
                [
                    [
                        [
                            'x' => 1,
                            'y' => 1,
                            'expected' => [
                                'r' => 254,
                                'g' => 255,
                                'b' => 255,
                            ]
                        ],
                        [
                            'x' => 2,
                            'y' => 1,
                            'expected' => [
                                'r' => 254,
                                'g' => 254,
                                'b' => 255,
                            ]
                        ],
                        [
                            'x' => 3,
                            'y' => 1,
                            'expected' => [
                                'r' => 254,
                                'g' => 255,
                                'b' => 254,
                            ]
                        ],
                        [
                            'x' => 4,
                            'y' => 1,
                            'expected' => [
                                'r' => 254,
                                'g' => 255,
                                'b' => 255,
                            ]
                        ],
                        [
                            'x' => 5,
                            'y' => 1,
                            'expected' => [
                                'r' => 255,
                                'g' => 254,
                                'b' => 255,
                            ]
                        ],
                        [
                            'x' => 6,
                            'y' => 1,
                            'expected' => [
                                'r' => 255,
                                'g' => 254,
                                'b' => 254,
                            ]
                        ],
                        [
                            'x' => 7,
                            'y' => 1,
                            'expected' => [
                                'r' => 254,
                                'g' => 255,
                                'b' => 255,
                            ]
                        ],
                        [
                            'x' => 8,
                            'y' => 1,
                            'expected' => [
                                'r' => 254,
                                'g' => 255,
                                'b' => 254,
                            ]
                        ],
                        [
                            'x' => 9,
                            'y' => 1,
                            'expected' => [
                                'r' => 254,
                                'g' => 255,
                                'b' => 254,
                            ]
                        ],
                        [
                            'x' => 10,
                            'y' => 1,
                            'expected' => [
                                'r' => 254,
                                'g' => 255,
                                'b' => 255,
                            ]
                        ],
                        [
                            'x' => 11,
                            'y' => 1,
                            'expected' => [
                                'r' => 254,
                                'g' => 255,
                                'b' => 255,
                            ]
                        ],
                        [
                            'x' => 12,
                            'y' => 1,
                            'expected' => [
                                'r' => 254,
                                'g' => 254,
                                'b' => 254,
                            ]
                        ],
                        [
                            'x' => 13,
                            'y' => 1,
                            'expected' => [
                                'r' => 254,
                                'g' => 254,
                                'b' => 255,
                            ]
                        ],
                        [
                            'x' => 14,
                            'y' => 1,
                            'expected' => [
                                'r' => 254,
                                'g' => 254,
                                'b' => 254,
                            ]
                        ],
                        [
                            'x' => 15,
                            'y' => 1,
                            'expected' => [
                                'r' => 254,
                                'g' => 254,
                                'b' => 254,
                            ]
                        ],
                        [
                            'x' => 16,
                            'y' => 1,
                            'expected' => [
                                'r' => 254,
                                'g' => 255,
                                'b' => 255,
                            ]
                        ],
                        [
                            'x' => 17,
                            'y' => 1,
                            'expected' => [
                                'r' => 254,
                                'g' => 255,
                                'b' => 255,
                            ]
                        ],
                        [
                            'x' => 18,
                            'y' => 1,
                            'expected' => [
                                'r' => 254,
                                'g' => 255,
                                'b' => 254,
                            ]
                        ],
                        [
                            'x' => 19,
                            'y' => 1,
                            'expected' => [
                                'r' => 254,
                                'g' => 255,
                                'b' => 255,
                            ]
                        ],
                        [
                            'x' => 20,
                            'y' => 1,
                            'expected' => [
                                'r' => 254,
                                'g' => 255,
                                'b' => 255,
                            ]
                        ],
                        [
                            'x' => 21,
                            'y' => 1,
                            'expected' => [
                                'r' => 255,
                                'g' => 255,
                                'b' => 254,
                            ]
                        ],
                        [
                            'x' => 22,
                            'y' => 1,
                            'expected' => [
                                'r' => 254,
                                'g' => 255,
                                'b' => 255,
                            ]
                        ],
                        [
                            'x' => 23,
                            'y' => 1,
                            'expected' => [
                                'r' => 255,
                                'g' => 254,
                                'b' => 254,
                            ]
                        ],
                        [
                            'x' => 24,
                            'y' => 1,
                            'expected' => [
                                'r' => 255,
                                'g' => 254,
                                'b' => 254,
                            ]
                        ],
                        [
                            'x' => 25,
                            'y' => 1,
                            'expected' => [
                                'r' => 254,
                                'g' => 255,
                                'b' => 255,
                            ]
                        ],
                        [
                            'x' => 26,
                            'y' => 1,
                            'expected' => [
                                'r' => 255,
                                'g' => 254,
                                'b' => 255,
                            ]
                        ],
                        [
                            'x' => 27,
                            'y' => 1,
                            'expected' => [
                                'r' => 254,
                                'g' => 254,
                                'b' => 254,
                            ]
                        ],
                        [
                            'x' => 28,
                            'y' => 1,
                            'expected' => [
                                'r' => 254,
                                'g' => 255,
                                'b' => 255,
                            ]
                        ],
                        [
                            'x' => 29,
                            'y' => 1,
                            'expected' => [
                                'r' => 255,
                                'g' => 255,
                                'b' => 254,
                            ]
                        ],
                        [
                            'x' => 30,
                            'y' => 1,
                            'expected' => [
                                'r' => 254,
                                'g' => 255,
                                'b' => 255,
                            ]
                        ],
                    ]
                ]
        ];
    }
}