<?php

namespace ArrayHelpers;

use PHPUnit\Framework\TestCase;

class ArrayHasTest extends TestCase
{
    public function testWillReturnFalseIfNotAvailable()
    {
        $data = [];
        $key = 'foo';
        $this->assertFalse(
            Arr::has($data, $key)
        );
        $this->assertFalse(
            array_has($data, $key)
        );
    }

    public function testWillReturnTrueIfAvailable()
    {
        $data = [
            'foo' => 'fighters',
            'bar' => 'tenders',
        ];
        $this->assertTrue(
            Arr::has($data, 'foo')
        );
        $this->assertTrue(
            array_has($data, 'foo')
        );
    }

    public function testWillReturnTrueIfFoundUsingDotNotation()
    {
        $data = [
            'i' => [
                "can't" => [
                    'get' => [
                        'no' => 'satisfaction',
                    ],
                ],
            ],
        ];
        $key = "i.can't.get.no";
        $this->assertTrue(
            Arr::has($data, $key)
        );
        $this->assertTrue(
            array_has($data, $key)
        );
    }

    public function testWillReturnFalseWhenDotNotationKeyNotFound()
    {
        $data = [
            'i' => [
                "can't" => [
                    'get' => [
                        'no' => 'satisfaction',
                    ],
                ],
            ],
        ];
        $key = "yes.i.tried";
        $this->assertFalse(
            Arr::has($data, $key)
        );
        $this->assertFalse(
            array_has($data, $key)
        );
    }
}
