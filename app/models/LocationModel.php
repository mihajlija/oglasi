<?php

/*
 * Model class for locations
 */

class LocationModel implements ModelInterface{
   
   
    /*
    * Return all locations from the location table
    */
   public static function getAll() {
        $SQL = 'SELECT * FROM location ORDER BY `name`;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute();
        if ($res) {
            return $prep->fetchAll(PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }

   /*
    * Return the location entry specified with an ID
    * @param int $id 
    * @return stdClass|NULL - vraca lokaciju kao objekat
    */
    public static function getById($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM location WHERE location_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$id]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
    
   /*
     * metod koji vraca lokaciju sa odredjenim slugom
     * #param string $slug
     * @return stdClass
     */
   
    public static function getBySlug($slug) {
        $SQL = 'SELECT * FROM location WHERE slug = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$slug]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
    
    /*
     * Adds a location to the database
     * Returns the ID of the location, or false if adding fails
     */
    public static function add($name, $slug) {
        $SQL = 'INSERT INTO location (name,slug) VALUES (?, ?)';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$name,$slug]);
        if ($res) {
            return DataBase::getInstance()->lastInsertId();
        } else {
          return false;  
        }
    }
    
    /* Function for editing location entry
      * @return boolean
      */
    public static function edit($id, $name, $slug){
        $SQL = 'UPDATE  location SET name = ?, slug = ? WHERE location_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$name,$slug, $id]);
    }

}
