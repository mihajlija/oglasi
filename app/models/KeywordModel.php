<?php
namespace Mihajlija\Oglasi\App\Models;

use Mihajlija\Oglasi\Sys\ModelInterface;
use Mihajlija\Oglasi\Sys\DataBaseProvider;

/**
 * Model class for keywords
 */
class KeywordModel implements ModelInterface {
   public static function getAll() {
        $SQL = 'SELECT * FROM keyword;';
        return DataBaseProvider::getInstance()->selectMany($SQL);
    }

   /**
    * 
    * @return Return all keywords from the keyword table
    */
    public static function getById($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM keyword WHERE keyword_id = ?;';
        return DataBaseProvider::getInstance()->selectOne($SQL, [$id]);
    }
    
    /**
     * Get a list of positions that require a given keyword - For a keyword_id get a postion_id array from position_keyword table
     * @param int keyword_id 
     * @return array
     */
    public static function getPositionsForKeywordId($keyword_id) {
        $id = intval($keyword_id);
        $SQL = 'SELECT * FROM position_keyword WHERE keyword_id = ?;';
        return DataBaseProvider::getInstance()->selectMany($SQL, [$id]);
    }
    
    /**
     * Adds a keyword to the database
     * @return Returns the ID of the keyword, or false if adding fails
     */
    public static function add($name, $slug) {
        $SQL = 'INSERT INTO keyword (name,slug) VALUES (?, ?)';
        DataBaseProvider::getInstance()->execute($SQL, [$name, $slug]);
        return DataBaseProvider::getInstance()->getLastInsertId();
    }
    
    /**
     * Function for editing keyword entry
     * @return boolean
     */
    public static function edit($id, $name, $slug){
        $SQL = 'UPDATE keyword SET name = ?, slug = ? WHERE keyword_id = ?;';
        return DataBaseProvider::getInstance()->execute($SQL, [$name, $slug, $id]);
    }
}
