<?php

namespace ArrayHelpers;

use PHPUnit\Framework\TestCase;

class ArrayGetTest extends TestCase
{
    public function testWillReturnDefaultIfNotAvailable()
    {
        $data = [];
        $key = 'foo';
        $default = 'bar';
        $result = Arr::get($data, $key, $default);
        $this->assertEquals($default, $result);
    }

    public function testWillReturnNullIfNoDefaultSpecified()
    {
        $data = [];
        $key = 'foo';
        $result = Arr::get($data, $key);
        $this->assertNull($result);
    }

    public function testWillReturnValueForKey()
    {
        $data = [
            'foo' => 'fighters',
            'bar' => 'tenders',
        ];
        $key = 'foo';
        $result = Arr::get($data, $key);
        $this->assertEquals('fighters', $result);
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
        $result = Arr::get($data, $key);
        $this->assertEquals('satisfaction', $result);
    }
}
