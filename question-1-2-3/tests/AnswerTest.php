<?php

namespace Tests;

require "./anwser.php";
use PHPUnit\Framework\TestCase;

class AnswerTest extends TestCase
{
    public function testAtmAlgorithm()
    {
        $expectedValue = [
            [
                "note_value" => 50,
                "number_of_note" => 40,
            ],
            [
                "note_value" => 10,
                "number_of_note" => 1,
            ],
            [
                "note_value" => 5,
                "number_of_note" => 1,
            ],
            [
                "note_value" => 1,
                "number_of_note" => 3,
            ]
        ];

        $this->assertSame($expectedValue, atmAlgorithm(2018));
    }

    public function testFindGoolge()
    {
        $this->assertSame(true, findGoolge('google'));
        $this->assertSame(true, findGoolge('GOOGLE'));
        $this->assertSame(true, findGoolge('g00gle'));
        $this->assertSame(true, findGoolge('g0oGle'));
        $this->assertSame(true, findGoolge('g<>0gl3'));
        $this->assertSame(true, findGoolge('googl3'));
        $this->assertSame(true, findGoolge('GooGIe'));
        $this->assertSame(true, findGoolge('g()()GI3'));
        $this->assertSame(true, findGoolge('g<>()GI3'));
        $this->assertSame(true, findGoolge('g[]()GI3'));
        $this->assertSame(false, findGoolge('g()()IG3'));
        $this->assertSame(true, findGoolge('g()<>Gi3'));
        $this->assertSame(false, findGoolge(' g()<>Gi3 '));
    }

    public function testCalculateAbsoluteDifference()
    {
        $testcase1 = [
            [1,2,3],
            [4,5,6],
            [9,8,9]
        ];

        $this->assertSame(2, calculateAbsoluteDifference($testcase1));

        $testcase2 = [
            [1,2,3,4],
            [4,5,6,7],
            [9,8,9,9],
            [9,8,9,9]
        ];

        $this->assertSame(3, calculateAbsoluteDifference($testcase2));
    }
}
