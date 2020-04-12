<?php

use K92\PhpLib\StrUtil;
use PHPUnit\Framework\TestCase;

class StrUtilTest extends TestCase
{
    public function test_generic()
    {
        // case 0
        // characters between key must be distinct
        // 12 and 23 have 2 in common
        $this->assertFalse(StrUtil::replaceOnce([12, 23], [9, 88], '123'));

        // case 1
        $this->assertEquals('23', StrUtil::replaceOnce([1, 2], [2, 3], '12'));
        $this->assertEquals('23', StrUtil::replaceOnce([2, 1], [3, 2], '12'));
        $this->assertEquals('bccc', StrUtil::replaceOnce(['a', 'b'], ['b', 'c'], 'abbc'));
        $this->assertEquals('233', StrUtil::replaceOnce([1, 2], [2, 3], '123'));

        // case 2
        $this->assertEquals(
            'aabccde',
             StrUtil::replaceOnce(['a', 'b', 'f'], ['b', 'c', 'a'], 'ffabcde')
        );

        // case 3
        $this->assertEquals(
            '"aaaccde',
             StrUtil::replaceOnce(["'", 'b', 'f'], ['"', 'c', 'a'], '\'ffabcde')
        );

        // case 4
        $this->assertEquals('axxbyyc', StrUtil::replaceOnce(['?', ';'], ['xx', 'yy'], 'a?b;c'));
        $this->assertEquals('ayybxxc', StrUtil::replaceOnce(['?', ';'], ['xx', 'yy'], 'a;b?c'));

        // case 5
        $this->assertEquals(
            'a1b0c',
             StrUtil::replaceOnce(['0', '1'], ['0', '1'], 'a1b0c')
        );

        $this->assertEquals(
            'ax1bx0c',
             StrUtil::replaceOnce(['0', '1'], ['x0', 'x1'], 'a1b0c')
        );

        $this->assertEquals(
            'ax10x2bx010c',
             StrUtil::replaceOnce(["0", "1"], ["x010", "x10x2"], 'a1b0c'),
        );

        $this->assertEquals(
             StrUtil::replaceOnce(['1', '0'], ['x110x2', 'x010'], 'a1b0c'), 'ax110x2bx010c'
        );

        // case n
        $this->assertEquals(
            'a277177',
             StrUtil::replaceOnce(["02", "13"], ["7", "7"], 'a20271137'),
        );

        // case 6
        $this->assertEquals(
            'a\';\'?c',
             StrUtil::replaceOnce(["?", ";"], ['\'?', '\';'], 'a;?c')
        );

        $this->assertEquals(
            'a\';\'?c',
             StrUtil::replaceOnce([';', '?'], ['\';', '\'?'], 'a;?c')
        );

        // case 7
        $this->assertEquals(
            'bcbc',
             StrUtil::replaceOnce(['a'], ['bc'], 'aa')
        );

        // case 8
        $this->assertEquals(
            'a1\'\ \'\'\ \'bx010c',
             StrUtil::replaceOnce([' ', 'x'], ['\'\ \'', 'x010'], 'a1  bxc')
        );

        $this->assertEquals(
            'a1\'\ \'\'\ \'bx010c',
             StrUtil::replaceOnce([' ', '0'], ['\'\ \'', 'x010'], 'a1  b0c')
        );

    }
}
