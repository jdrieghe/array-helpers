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
    }

    public function testWillFindUsingDotNotation()
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
    }
}
