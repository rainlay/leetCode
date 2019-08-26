<?php
/**
 * Date: 2019/8/7
 * Time: 下午 12:12
 */

use PHPUnit\Framework\TestCase;

class Q12_Integer_to_Roman_Test extends TestCase
{

    /**
     * @param Integer $num
     * @return String
     */
    function intToRoman($num) {

        $roman = [
            [
                "num"        => 1000,
                "letter"     => "M",
                "div"        => 900,
                "div_letter" => "C",
            ],
            [
                "num"        => 500,
                "letter"     => "D",
                "div"        => 400,
                "div_letter" => "C",
            ],
            [
                "num"        => 100,
                "letter"     => "C",
                "div"        => 90,
                "div_letter" => "X",
            ],
            [
                "num"        => 50,
                "letter"     => "L",
                "div"        => 40,
                "div_letter" => "X",
            ],
            [
                "num"        => 10,
                "letter"     => "X",
                "div"        => 9,
                "div_letter" => "I",
            ],
            [
                "num"        => 5,
                "letter"     => "V",
                "div"        => 4,
                "div_letter" => "I",
            ],
            [
                "num"    => 1,
                "letter" => "I",
            ],
        ];

        $str = "";
        $cursor = 0;
        $cursorMax = sizeof($roman) ;

        while ($num > 0 && $cursor < $cursorMax) {
            if ($num >= $roman[$cursor]["num"]) {
                if ($cursor > 0 && $num >= $roman[$cursor - 1]["div"]
                    && $num < $roman[$cursor - 1]["num"]) {
                    $num -= $roman[$cursor - 1]["div"];
                    $str .= $roman[$cursor - 1]["div_letter"]
                        . $roman[$cursor - 1]["letter"];
                } else {
                    $num -= $roman[$cursor]["num"];
                    $str .= $roman[$cursor]["letter"];
                }
            } else {
                $cursor++;
            }
        }
        return $str;
    }

    public function testOne()
    {
        $result = $this->intToRoman(4);

        self::assertEquals("IV",$result);
    }

    public function testTwo()
    {
        $result = $this->intToRoman(3);

        self::assertEquals("III",$result);
    }

    public function testThree()
    {
        $result = $this->intToRoman(58);

        self::assertEquals("LVIII",$result);
    }

    public function testFour()
    {
        $result = $this->intToRoman(1994);

        self::assertEquals("MCMXCIV",$result);
    }

    public function testFive()
    {
        $result = $this->intToRoman(5);

        self::assertEquals("V",$result);
    }

}
