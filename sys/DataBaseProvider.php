<?php
namespace Mihajlija\Oglasi\Sys;

use Milantex\DAW\DataBase;

class DataBaseProvider {
    private static $db = null;

    public static function getInstance() {
        if (static::$db === null) {
            static::$db = new DataBase(\Configuration::DB_HOST, \Configuration::DB_NAME, \Configuration::DB_USER, \Configuration::DB_PASS);
        }

        return static::$db;
    }
}
