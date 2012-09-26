<?php
namespace Zx\Test;
class Test{
    
    /**
     * @example 
     * \Zx\Test\Test::object_log('lob', $lob, __FILE__, __LINE__, __CLASS__, __METHOD__);
     * @param string $title
     * @param string $obj
     * @param string $file
     * @param string $line
     * @param string $class
     * @param string $method
     */
    public static function object_log($title = '', $obj=NULL, $file='', $line='', $class='', $method='') {
        $message = $title . ':' . print_r($obj, true) . 'file:' . $file.
                'line:' . $line . 'class:' . $class . 'method:' . $method . '<br />';
        
        error_log($message, 3, LOG_FILE);
    }
    
}



