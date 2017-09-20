<?php
namespace Mihajlija\Oglasi\App\Models;

use Mihajlija\Oglasi\Sys\ModelInterface;
use Mihajlija\Oglasi\Sys\DataBaseProvider;

class ExperienceModel implements ModelInterface{
    public static function getAll() {
        $SQL = 'SELECT * FROM experience ORDER BY `name`;';
        return DataBaseProvider::getInstance()->selectMany($SQL);
    }

    public static function getById($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM experience WHERE experience_id = ?;';
        return DataBaseProvider::getInstance()->selectOne($SQL, [$id]);
    }
}
