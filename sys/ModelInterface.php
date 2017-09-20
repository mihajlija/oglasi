<?php
namespace Mihajlija\Oglasi\Sys;

interface ModelInterface {
    public static function getAll();
    
    public static function getById($id);
}
