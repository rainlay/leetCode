<?php
/**
 * Date: 2019/8/7
 * Time: 下午 12:12
 */

use PHPUnit\Framework\TestCase;

class Q13_Roman_to_Integer_Test extends TestCase
{

    /**
     * @param String $s
     * @return Integer
     */
    function romanToInt($s)
    {
        $roman = [
            "I" => 1,
            "V" => 5,
            "X" => 10,
            "L" => 50,
            "C" => 100,
            "D" => 500,
            "M" => 1000,
        ];

        $n     = str_split($s);
        $max   = count($n);
        $sum   = 0;

        for ($i = 0; $i < $max; $i++) {

            $word = $n[$i];

            $num = $roman[$word];

            if ($i != $max - 1) {
                if ($n[$i] == "I" && ($n[$i + 1] == "V" || $n[$i + 1] == "X")) {
                    $num = 0 - $roman[$word];
                } elseif ($n[$i] == "X"
                    && ($n[$i + 1] == "L"
                        || $n[$i + 1] == "C")) {
                    $num = 0 - $roman[$word];
                } elseif ($n[$i] == "C"
                    && ($n[$i + 1] == "D"
                        || $n[$i + 1] == "M")) {
                    $num = 0 - $roman[$word];
                }
            }

            $sum += $num;
        }

        return ($sum);

    }

    public function testOne()
    {
        $result = $this->romanToInt("III");

        self::assertEquals(3, $result);
    }

    public function testTwo()
    {
        $result = $this->romanToInt("IV");

        self::assertEquals(4, $result);
    }

    public function testThree()
    {
        $result = $this->romanToInt("IX");

        self::assertEquals(9, $result);
    }

    public function testFour()
    {
        $result = $this->romanToInt("LVIII");

        self::assertEquals(58, $result);
    }

}
