<?php

namespace K92\PhpLib;

class BashCharEscape {

    static public function escape(String $str, String $lbs, String $hbs, $quote = "'")
    {
        $kv_replacements = BashCharEscape::getReplacements([
            'lbs' => $lbs,
            'hbs' => $hbs,
            'quote' => $quote
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
        $quote = $configs['quote'];

        return [

            // single quote
            "'" => "$lbs$quote$hbs'$lbs$quote",

            // double quote
            "\"" => "$lbs$quote$hbs\"$lbs$quote",

            // back quote
            "`" => "$lbs$quote$hbs`$lbs$quote",

            // backslash
            "\\" => "$lbs$quote$hbs\\$lbs$quote",

            // asterisk
            "*" => "$lbs$quote$hbs*$lbs$quote",

            // left parenthesis
            "(" => "$lbs$quote$hbs($lbs$quote",

            // right parenthesis
            ")" => "$lbs$quote$hbs)$lbs$quote",

            // left square bracket
            "[" => "$lbs$quote$hbs"."["."$lbs$quote",

            // right curly bracket
            "}" => "$lbs$quote$hbs"."}"."$lbs$quote",

            // less than sign
            "<" => "$lbs$quote$hbs"."<"."$lbs$quote",

            // greater than sign
            ">" => "$lbs$quote$hbs".">"."$lbs$quote",

            // vertical line
            "|" => "$lbs$quote$hbs|$lbs$quote",

            // space
            " " => "$lbs$quote$hbs $lbs$quote",

            // semicolon
            ";" => "$lbs$quote$hbs;$lbs$quote",

            // question mark
            "?" => "$lbs$quote$hbs"."?"."$lbs$quote",

            // ampersand (and)
            "&" => "$lbs$quote$hbs&$lbs$quote",

            // minus
            "-" => "$lbs$quote$hbs-$lbs$quote",

            // dollar sign
            "$" => "$lbs$quote$hbs$$lbs$quote",
        ];
    }
}
