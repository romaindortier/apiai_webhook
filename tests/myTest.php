<?php

use PHPUnit\Framework\TestCase;


class MyTest extends TestCase
{
    protected function setUp()
    {
        // $this->chartConfig = new ChartConfig();
    }

    public function test_webhook()
    {
        $array = array(
            'Italie' => array(
                '2001' => 23,
                '2002' => 74,
            ),
            'France' => array(
                '2001' => 12,
                '2002' => 33,
            ),
        );
        $this->assertGreaterThanOrEqual(1, $array, '"array" is empty');
    }

    public function test_2_webhook()
    {
        $array = array();
        $this->assertGreaterThanOrEqual(1, $array, '"array" is empty');
    }
}