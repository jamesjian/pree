<?php

namespace App\Transaction;

class Html {
    static $title = '澳大利亚保险 澳洲保险';
    static $keyword = '澳大利亚保险 澳洲保险';
    static $description = '澳大利亚保险 澳洲保险';
    public static function set_title($title)
    {
        self::$title = $title . '-- 澳大利亚保险 澳洲保险';
    }
    public static function get_title()
    {
        return self::$title;
    }
    public static function set_description($description)
    {
        self::$description = $description;
    }
    public static function get_description()
    {
        return self::$description;
    }
    public static function set_keyword($keyword)
    {
        self::$keyword = $keyword;
    }
    public static function get_keyword()
    {
        return self::$keyword;
    }
    /**
     * generate a snag URL such as this-is-a-snag-url
     * remove all invalid characters for an URL, such as all punctuation
     * @param string $title
     * currently generate it manually to avoid duplicate
     */
    public static function generate_url($title)
    {
        
    }
    public static function get_url()
    {
        
    }

}

