<?php

class LanguageModel implements ModelInterface{

    public static function getAll() {
        $SQL = 'SELECT * FROM language ORDER BY `name`;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute();
        if ($res) {
            return $prep->fetchAll(PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }

    public static function getById($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM language WHERE language_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$id]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
}
