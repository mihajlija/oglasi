<?php
namespace Mihajlija\Oglasi\App\Models;

use Mihajlija\Oglasi\Sys\ModelInterface;
use Mihajlija\Oglasi\Sys\DataBaseProvider;

class UserModel implements ModelInterface {
    public static function getAll() {
        $SQL = 'SELECT * FROM user;';
        return DataBaseProvider::getInstance()->selectMany($SQL);
    }

    public static function getById($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM user WHERE user_id = ?;';
        return DataBaseProvider::getInstance()->selectOne($SQL, [$id]);
    }

    public static function getByUsernameAndPasswordHash($username, $passwordHash) {
        $SQL = 'SELECT * FROM user WHERE `username` = ? AND `password` = ? AND active = 1;';
        return DataBaseProvider::getInstance()->selectOne($SQL, [$username, $passwordHash]);
    }
}
