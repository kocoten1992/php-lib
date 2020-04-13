<?php

namespace K92\PhpLib;

class CurlCharEscape {

    static public function escape(String $str, String $lbs, String $hbs, Array $over_ride = []) {

        $kv_replacements = CurlCharEscape::getReplacements([
            'lbs' => $lbs,
            'hbs' => $hbs,
            'over_ride' => $over_ride
        ]);

        $replaced_str = StrUtil::replaceOnce(
            array_keys($kv_replacements),
            array_values($kv_replacements),
            $str
        );

        return $replaced_str;
    }

    static protected function getReplacements(Array $configs)
    {
        $lbs = $configs['lbs'];
        $hbs = $configs['hbs'];
        $over_ride = $configs['over_ride'];

        return $over_ride + [

            // backslash
            "\\" => "$hbs\\$hbs\\",

            // single quote
            "'" => "$hbs'",

            // double quote
            "\"" => "$hbs\"",

            // back quote
            "`" => "$hbs`",

            // asterisk
            "*" => "$lbs*",

            // left parenthesis
            "(" => "$lbs(",

            // right parenthesis
            ")" => "$lbs)",

            // left square bracket
            "[" => "$lbs"."[",

            // right curly bracket
            "}" => "$lbs}",

            // less than sign
            "<" => "$lbs<",

            // greater than sign
            ">" => "$lbs>",

            // vertical line
            "|" => "$lbs|",

            // semicolon
            ";" => "$lbs;",

            // question mark
            "?" => "$lbs?",

            // equal
            "=" => "$lbs=",

            // pound
            "#" => "$lbs#",

            // ampersand (and)
            "&" => "$lbs&",

            // dollar
            "$" => "$hbs$",
        ];

    }
}
