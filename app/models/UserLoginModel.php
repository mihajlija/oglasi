<?php
namespace Mihajlija\Oglasi\App\Models;

use Mihajlija\Oglasi\Sys\ModelInterface;
use Mihajlija\Oglasi\Sys\DataBaseProvider;

class UserModel implements ModelInterface {
    public static function getAll() {
        $SQL = 'SELECT * FROM user_login ORDER BY `datetime` DESC;';
        return DataBaseProvider::getInstance()->selectMany($SQL);
    }

    public static function getById($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM user_login WHERE user_login_id = ?;';
        return DataBaseProvider::getInstance()->selectOne($SQL, [$id]);
    }
}
