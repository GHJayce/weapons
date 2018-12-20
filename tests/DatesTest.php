<?php

namespace tests;

use PHPUnit\Framework\TestCase;

class DatesTest extends TestCase
{
    public function setUp()
    {
        date_default_timezone_set('PRC');
    }

    public function testDuration()
    {
        $this->assertEquals([
            'year' => 1.0,
            'month' => 2.0,
            'day_total' => 430.0,
            'hour' => 19.0,
            'minute' => 4.0,
            'second' => 6.0,
        ], date_duration('2017-10-15 20:31:29', '2018-12-20 15:35:35'));
    }

    public function testToReadable()
    {
        $this->assertEquals('刚刚', date_readable(time()));
        $this->assertEquals('1 分钟前', date_readable(strtotime('-1 minute')));
        $this->assertEquals('5 个月前', date_readable(date('Y-m-d', strtotime('-5 month -13 hour'))));
        $this->assertEquals('2016-12-20 18:56:29', date_readable('2016-12-20 18:56:29'));
    }
}