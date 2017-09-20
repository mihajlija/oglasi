<?php
namespace Mihajlija\Oglasi\App\Models;

use Mihajlija\Oglasi\Sys\ModelInterface;
use Mihajlija\Oglasi\Sys\DataBaseProvider;

/**
 * Model class for locations
 */
class LocationModel implements ModelInterface{
   /**
    * Return all locations from the location table
    */
   public static function getAll() {
        $SQL = 'SELECT * FROM location ORDER BY `name`;';
        return DataBaseProvider::getInstance()->selectMany($SQL);
    }

   /**
    * Return the location entry specified with an ID
    * @param int $id 
    * @return stdClass|NULL - vraca lokaciju kao objekat
    */
    public static function getById($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM location WHERE location_id = ?;';
        return DataBaseProvider::getInstance()->selectOne($SQL, [$id]);
    }

    /**
     * metod koji vraca lokaciju sa odredjenim slugom
     * #param string $slug
     * @return stdClass
     */
    public static function getBySlug($slug) {
        $SQL = 'SELECT * FROM location WHERE slug = ?;';
        return DataBaseProvider::getInstance()->selectMany($SQL, [$slug]);
    }

    /**
     * Adds a location to the database
     * Returns the ID of the location, or false if adding fails
     */
    public static function add($name, $slug) {
        $SQL = 'INSERT INTO location (name,slug) VALUES (?, ?)';
        DataBaseProvider::getInstance()->execute($SQL, [$name, $slug]);
        return DataBaseProvider::getInstance()->getLastInsertId();
    }

    /**
     *  Function for editing location entry
     * @return boolean
     */
    public static function edit($id, $name, $slug) {
        $SQL = 'UPDATE  location SET name = ?, slug = ? WHERE location_id = ?;';
        return DataBaseProvider::getInstance()->execute($SQL, [$name,$slug, $id]);
    }
}
