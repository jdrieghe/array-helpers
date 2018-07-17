<?php

namespace ArrayHelpers;

use PHPUnit\Framework\TestCase;

class ArraySetTest extends TestCase
{
    public function testWillSetSingleValue()
    {
        $expected = ['rolling' => 'stones'];

        $initial = [];
        Arr::set($initial, 'rolling', 'stones');
        $this->assertEquals($expected, $initial);

        $initial = [];
        array_set($initial, 'rolling', 'stones');
        $this->assertEquals($expected, $initial);
    }

    public function testWillOverwriteExistingValue()
    {
        $initial = ['rolling' => 'stones'];
        Arr::set($initial, 'rolling', 'thunder');
        $this->assertEquals(
            ['rolling' => 'thunder'],
            $initial
        );
    }

    public function testWillSetUsingDotNotation()
    {
        $initial = [];
        Arr::set($initial, "i.can't.get.no", 'satisfaction');
        $this->assertEquals(
            [
                'i' => [
                    "can't" => [
                        'get' => [
                            'no' => 'satisfaction',
                        ],
                    ],
                ],
            ],
            $initial
        );
    }

    public function testWillOnlyPartiallyOverwriteUsingDotNotation()
    {
        $initial = [
            'i' => [
                "can't" => [
                    'live' => [
                        'in' => [
                            'a' => 'living room',
                        ]
                    ]
                ]
            ]
        ];
        Arr::set($initial, "i.can't.get.no", 'satisfaction');
        $this->assertEquals(
            [
                'i' => [
                    "can't" => [
                        'live' => [
                            'in' => [
                                'a' => 'living room',
                            ],
                        ],
                        'get' => [
                            'no' => 'satisfaction',
                        ],
                    ],
                ],
            ],
            $initial
        );
    }
}
