#<?php

defined('SYSPATH') or die('No direct script access.');

class Enum_System extends Enum_Main {
    const SYSTEM_BUILD = "20130724";
    const SYSTEM_VERSION_NAME = "1.0.1";
    
    public static function getDescription($id){
        switch($id){
            default:
                 return self::idToType($id);
        }
    }
    
}
