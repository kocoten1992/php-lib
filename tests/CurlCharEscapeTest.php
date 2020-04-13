<?php

use K92\PhpLib\CurlCharEscape;
use PHPUnit\Framework\TestCase;

class CurlCharEscapeTest extends TestCase
{
    public function test_bash_char_escape()
    {
        $this->assertEquals('\\?', CurlCharEscape::escape('?', '\\', '\\\\\\'));

        $this->assertEquals('\\\\\\$', CurlCharEscape::escape('$', '\\', '\\\\\\'));

        // not escape
        $this->assertEquals('{', CurlCharEscape::escape('{', '\\', '\\\\\\',["'" => '']));

        // override
        $this->assertEquals(
            'abc',
            CurlCharEscape::escape('"', '\\', '\\\\\\', ['"' => 'abc'])
        );
    }
}
