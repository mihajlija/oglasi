<?php
namespace Mihajlija\Oglasi\App\Models;

use Mihajlija\Oglasi\Sys\ModelInterface;
use Mihajlija\Oglasi\Sys\DataBaseProvider;

/**
 * Model for job positions
 */
class PositionModel implements ModelInterface{
    /**
     * Return all position entries from database
     */
    public static function getAll() {
        $SQL = 'SELECT * FROM position;';
        return DataBaseProvider::getInstance()->selectMany($SQL);
    }
    
    /**
     * Return a limited number of positions from the database (4 pagination later)
     * @param int $page
     */
    public static function getAllPaged($page) {
        $page = max(0, intval($page));
        $first = $page * intval(\Configuration::ITEMS_PER_PAGE);
        $SQL = 'SELECT * FROM `position` ORDER BY `title` LIMIT ' . $first . ', ' . intval(\Configuration::ITEMS_PER_PAGE);
        return DataBaseProvider::getInstance()->selectMany($SQL);
    }

    /**
     * Return the position entry specified with an ID
     * @param int $id 
     * @return stdClass|NULL - vraca oglas kao objekat
     */
    public static function getById($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM position WHERE position_id = ?;';
        return DataBaseProvider::getInstance()->selectOne($SQL, [$id]);
    }
    
    /**
     * Return the location of position entry, specified with the position ID
     * @param int $position_id 
     * @return stdClass|NULL - vraca oglas kao objekat
     */
    public static function getLocationForPositionId($position_id){
        $id = intval($position_id);
        $SQL = 'SELECT location_id FROM position WHERE position_id = ?;';
        return DataBaseProvider::getInstance()->selectOne($SQL, [$id]);
    }
    
    /**
     * Get a list of keywords for a given position - For a postion_id get a keyword_id array from position_keyword table
     * @param int position_id 
     * @return array
     */
    public static function getKeywordsforPositionId($position_id) {
        $id = intval($position_id);
        $SQL = 'SELECT * FROM position_keyword WHERE position_id = ?;';
        return DataBaseProvider::getInstance()->selectMany($SQL, [$id]);
    }
    
    /**
     * Get all positions advertised for a location specified with location_id
     * @param int $id ID oglasa
     * @return array
     */  
    public static function getPositionsByLocationId($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM position WHERE location_id = ?;';
        return DataBaseProvider::getInstance()->selectMany($SQL, [$id]);
    }
    
    /**
     * metod koji vraca objekat sa podacima za oglas sa zadatim slugom
     * #param string $slug
     * @return stdClass
     */
    public static function getBySlug($slug) {
        $SQL = 'SELECT * FROM position WHERE slug = ?;';
        return DataBaseProvider::getInstance()->selectOne($SQL, [$slug]);
    }
    
    /**
     * Adds a position to the database
     * Returns the ID of the position, or false if adding fails
     */
    public static function add($title, $slug, $description, $requirements, $responsibilities, $location_id) {
        $SQL = 'INSERT INTO position (title, slug, description, requirements, responsibilities, location_id) VALUES (?, ?, ?, ?, ?, ?)';
        DataBaseProvider::getInstance()->execute($SQL, [$title, $slug, $description, $requirements, $responsibilities, $location_id]);
        return DataBaseProvider::getInstance()->getLastInsertId();
    }
    
    /**
     *  Function for editing position e ntry
     * @return boolean
     */
    public static function edit($id, $title, $slug, $description, $requirements, $responsibilities, $location_id){
        $SQL = 'UPDATE  position SET title = ?, slug = ?, description = ?, requirements = ?, responsibilities = ?, location_id = ? WHERE position_id = ?;';
        return DataBaseProvider::getInstance()->execute($SQL, [$title, $slug, $description, $requirements, $responsibilities, $location_id, $id]);
    }

    /**
     * Method adds keywords to the position, sets id pairs in position_keyword table
     */
    public static function addKeywordToPosition($position_id, $keyword_id) {
        $SQL = 'INSERT INTO position_keyword (position_id, keyword_id) VALUES (?, ?)';
        return DataBaseProvider::getInstance()->execute($SQL, [$position_id, $keyword_id]);
    }

    /**
     * Reset keywords when editing position
     */
    public static function deleteAllKeywords($position_id) {
        $SQL = 'DELETE FROM position_keyword WHERE position_id = ?';
        return DataBaseProvider::getInstance()->execute($SQL, [$position_id]);
    }
}
