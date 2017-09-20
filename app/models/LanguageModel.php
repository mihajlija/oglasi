<?php
namespace Mihajlija\Oglasi\App\Models;

use Mihajlija\Oglasi\Sys\ModelInterface;
use Mihajlija\Oglasi\Sys\DataBaseProvider;

class LanguageModel implements ModelInterface{
    public static function getAll() {
        $SQL = 'SELECT * FROM language ORDER BY `name`;';
        return DataBaseProvider::getInstance()->selectMany($SQL);
    }

    public static function getById($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM language WHERE language_id = ?;';
        return DataBaseProvider::getInstance()->selectOne($SQL, [$id]);
    }
}
