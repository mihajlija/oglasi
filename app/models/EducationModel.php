<?php
namespace Mihajlija\Oglasi\App\Models;

use Mihajlija\Oglasi\Sys\ModelInterface;
use Mihajlija\Oglasi\Sys\DataBaseProvider;

class EducationModel implements ModelInterface{
    public static function getAll() {
        $SQL = 'SELECT * FROM education ORDER BY `name`;';
        return DataBaseProvider::getInstance()->selectMany($SQL);
    }

    public static function getById($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM education WHERE education_id = ?;';
        return DataBaseProvider::getInstance()->selectOne($SQL, [$id]);
    }
}
