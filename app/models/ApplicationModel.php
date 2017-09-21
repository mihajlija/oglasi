<?php
namespace Mihajlija\Oglasi\App\Models;

use Mihajlija\Oglasi\Sys\ModelInterface;
use Mihajlija\Oglasi\Sys\DataBaseProvider;

class ApplicationModel implements ModelInterface{
    public static function getAll() {
        $SQL = 'SELECT * FROM application;';
        return DataBaseProvider::getInstance()->selectMany($SQL);
    }

    public static function getById($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM application WHERE application_id = ?;';
        return DataBaseProvider::getInstance()->selectOne($SQL, [$id]);
    }
}
