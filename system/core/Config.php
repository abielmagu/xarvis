<?php namespace System\Core;

abstract class Config {

    static public function get($config, $key = null)
    {
        $config_path = BASE."/config/{$config}.php";
        $config_file = require($config_path);

        if( !is_null($key) )
        {
            if( !array_key_exists($key, $config_file) ) 
                Exception::stop("Config {$key} key not exists");
            
            return $config_file[$key];
        }
        return $config_file;
    }
}