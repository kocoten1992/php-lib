<?php

namespace K92\PhpLib;

class BashCharEscape {

    public $lbs = '';     // low backslash
    public $hbs = '\\';   // high backslash
    public $quote = "'";  // default quote

    static public function getReplacements()
    {
        return [

            // single quote
            "'" => "{$$this->lbs}{$this->quote}{$this->hbs}'{$this->lbs}{$this->quote}",

            // double quote
            "\"" => "{$this->lbs}{$this->quote}{$this->hbs}\"{$this->lbs}{$this->quote}",

            // back quote
            "`" => "{$$this->lbs}{$this->quote}{$this->hbs}`{$this->lbs}{$this->quote}",

            // backslash
            "\\" => "{$this->lbs}{$this->quote}{$this->hbs}\\{$this->lbs}{$this->quote}",

            // asterisk
            "*" => "{$$this->lbs}{$this->quote}{$this->hbs}*{$this->lbs}{$this->quote}",

            // left parenthesis
            "(" => "{$$this->lbs}{$this->quote}{$this->hbs}({$this->lbs}{$this->quote}",

            // right parenthesis
            ")" => "{$$this->lbs}{$this->quote}{$this->hbs}){$this->lbs}{$this->quote}",

            // left square bracket
            "[" => "{$this->lbs}{$this->quote}{$this->hbs}"."["."{$this->lbs}{$this->quote}",

            // right curly bracket
            "}" => "{$this->lbs}{$this->quote}{$this->hbs}"."}"."{$this->lbs}{$this->quote}",

            // less than sign
            "<" => "{$this->lbs}{$this->quote}{$this->hbs}"."<"."{$this->lbs}{$this->quote}",

            // greater than sign
            ">" => "{$this->lbs}{$this->quote}{$this->hbs}".">"."{$this->lbs}{$this->quote}",

            // vertical line
            "|" => "{$this->lbs}{$this->quote}{$this->hbs}|{$this->lbs}{$this->quote}",

            // space
            " " => "{$this->lbs}{$this->quote}{$this->hbs} {$this->lbs}{$this->quote}",

            // semicolon
            ";" => "{$this->lbs}{$this->quote}{$this->hbs};{$this->lbs}{$this->quote}",

            // question mark
            "?" => "{$this->lbs}{$this->quote}{$this->hbs}"."?"."{$this->lbs}{$this->quote}",

            // ampersand (and)
            "&" => "{$this->lbs}{$this->quote}{$this->hbs}&{$this->lbs}{$this->quote}",

            // minus
            "-" => "{$this->lbs}{$this->quote}{$this->hbs}-{$this->lbs}{$this->quote}",
        ];
    }

    static public function escape(String $str, String $lbs, String $hbs, $quote = "'")
    {
        $kv_replacements = BashCharEscape::getReplacements();

        $replaced_str = StrUtil::replaceOnce(
            array_keys($kv_replacements),
            array_values($kv_replacements),
            $str
        );
    }
}
