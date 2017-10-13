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
        $result = array_get($data, $key, $default);
        $this->assertEquals($default, $result);
    }

    public function testWillReturnNullIfNoDefaultSpecified()
    {
        $data = [];
        $key = 'foo';
        $this->assertNull(Arr::get($data, $key));
        $this->assertNull(array_get($data, $key));
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
        $result = array_get($data, $key);
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
        $result = array_get($data, $key);
        $this->assertEquals('satisfaction', $result);
    }

    public function testWillReturnDefaultWhenDotNotationKeyNotFound()
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
        $this->assertNull(Arr::get($data, $key));
        $this->assertNull(array_get($data, $key));
    }
}
