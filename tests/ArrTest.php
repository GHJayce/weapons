<?php

namespace tests;

use PHPUnit\Framework\TestCase;

class ArrTest extends TestCase
{
    public function testGroup()
    {
        $this->assertEquals([
            3 => ['one', 'two'],
            5 => ['three']
        ], array_group(['one', 'two', 'three'], 'strlen'));

        $this->assertEquals([
            'apple' => [
                [
                    'name' => 'apple',
                    'price' => 19,
                ],
                [
                    'name' => 'apple',
                    'price' => 16,
                ],
            ],
            'banana' => [
                [
                    'name' => 'banana',
                    'price' => 12,
                ],
            ],
        ], array_group([
            [
                'name' => 'apple',
                'price' => 19,
            ],
            [
                'name' => 'apple',
                'price' => 16,
            ],
            [
                'name' => 'banana',
                'price' => 12,
            ],
        ], 'name'));
    }

    public function testToOneDimension()
    {
        $this->assertEquals([
            'apple',
            'banana',
            'orange',
        ], array_one_dimension([
            ['name' => 'apple'],
            ['name' => 'banana'],
            ['name' => 'orange'],
        ], 'name'));
    }
}