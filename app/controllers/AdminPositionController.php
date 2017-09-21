<?php
namespace Mihajlija\Oglasi\App\Controllers;

use Mihajlija\Oglasi\Sys\Misc;
use Mihajlija\Oglasi\Sys\AdminController;
use Mihajlija\Oglasi\App\Models\LocationModel;
use Mihajlija\Oglasi\App\Models\PositionModel;
use Mihajlija\Oglasi\App\Models\KeywordModel;

/*
 * Admin panel controller class for handling positions
 */
class AdminPositionController extends AdminController {
    /**
     * Controller method that displays all positions
     */
    public function index() {
        $positions = PositionModel::getAll();

        for ($i=0; $i<count($positions); $i++) {
            $positions[$i]->location = LocationModel::getById($positions[$i]->location_id);
        }

        $this->set('positions', $positions);
    }

    /**
     * Adds position data if it's successfully sent via HTTP POST
     * @return void
     */
    public function add() {
        $this->set('locations', LocationModel::getAll());
        $this->set('keywords', KeywordModel::getAll());
        
        if (!$_POST) return;

        $title = filter_input(INPUT_POST, 'title');
        $description = filter_input(INPUT_POST, 'description');
        $slug = filter_input(INPUT_POST, 'slug');
        $requirements = filter_input(INPUT_POST, 'requirements');
        $responsibilities = filter_input(INPUT_POST, 'responsibilities');

        $location_id = filter_input(INPUT_POST, 'location_id', FILTER_SANITIZE_NUMBER_INT);

        $position_id = PositionModel::add($title, $slug, $description, $requirements, $responsibilities, $location_id); #Session::get('user_id')

        // If the location was added successfully redirect the user
        if ($position_id) {
            $keyword_ids = filter_input(INPUT_POST, 'keyword_ids', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY);
            
            foreach ($keyword_ids as $keyword_id) {
                PositionModel::addKeywordToPosition($position_id, $keyword_id);
            }

            Misc::redirect('admin/positions/');
        }

        $this->set('message', "Doslo je do greske prilikom dodavanja oglasa u bazu podataka");
    }
    
    /** 
     * Edits location data if it's successfully sent via HTTP POST
     * @param $id
     * @return void
     */
    public function edit($id) {
        $this->set('locations', LocationModel::getAll());
        $this->set('keywords', KeywordModel::getAll());
        
        $position = PositionModel::getById($id); //get the position you want to edit

        if (!$position) {
            Misc::redirect('admin/positions/');
        }
        
        //4 pre-populating keyword checkboxes at
        $position->keywords = PositionModel::getKeywordsforPositionId($id); //niz objekata
        $position->keyword_ids = []; //niz keyword ids iscitavamo iz niza keyword objekata

        foreach ($position->keywords as $keyword) {
            $position->keyword_ids[] = $keyword->keyword_id;
        }
        
        $this->set('position', $position); //4 accessing it on the page
        
        if (!$_POST) return; //Check if the user entered an ID 
        
        $title = filter_input(INPUT_POST, 'title');
        $description = filter_input(INPUT_POST, 'description');
        $slug = filter_input(INPUT_POST, 'slug');
        $reqirements = filter_input(INPUT_POST, 'reqirements');
        $responsibilities = filter_input(INPUT_POST, 'responsibilities');
        
        $location_id = filter_input(INPUT_POST, 'location_id', FILTER_SANITIZE_NUMBER_INT);
        
        $res = PositionModel::edit($id, $title, $slug, $description, $reqirements, $responsibilities, $location_id);
        
        $keyword_ids = filter_input(INPUT_POST, 'keyword_ids', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY);
         
        //brise sve keywords koje su bile dodeljene oglasu pa zatim dodaje nove
        PositionModel::deleteAllKeywords($id);
        foreach ($keyword_ids as $keyword_id) {
            PositionModel::addKeywordToPosition($id, $keyword_id);
        }
        
        // If the location was added successfully, redirect the user
        if ($res) {
            Misc::redirect('admin/positions/');
        }

        $this->set('message', "Doslo je do greske prilikom izmene podataka");
    }
}
