<?php
namespace Mihajlija\Oglasi\App\Controllers;

use Mihajlija\Oglasi\Sys\Misc;
use Mihajlija\Oglasi\Sys\AdminController;
use Mihajlija\Oglasi\App\Models\LocationModel;

/**
 * Admin panel controller class for handling locations
 */
class AdminLocationController extends AdminController {
    /**
     * Controller method that displays all locations
     */
    public function index() {
        $this->set('locations', LocationModel::getAll());
    }
    
    /**
     * Adds location data if it's successfully sent via HTTP POST
     * @return void
     */
    public function add() {
        if (!$_POST) return;

        $name = filter_input(INPUT_POST, 'name');
        $slug = filter_input(INPUT_POST, 'slug');

        $location_id = LocationModel::add($name, $slug);
        
        // If the location was added successfully redirect the user
        if ($location_id) {
            Misc::redirect('admin/locations/');
        }

        $this->set('message', "Doslo je do greske prilikom dodavanja lokacije u bazu podataka");
    }
    
    /** 
     * Edits location data if it's successfully sent via HTTP POST
     * @param $id
     * @return void
     */
    public function edit($id) {
        $location = LocationModel::getById($id);
        
        if (!$location) {
            Misc::redirect('admin/locations/');
        }

        $this->set('location', $location);
        if (!$_POST) return; //Check if the user entered an ID 
        
        $name = filter_input(INPUT_POST, 'name');
        $slug = filter_input(INPUT_POST, 'slug');
        
        $res = LocationModel::edit($id, $name, $slug);
        
        // If the location was added successfully, redirect the user
        if ($res) {
            Misc::redirect('admin/locations/');
        }

        $this->set('message', "Doslo je do greske prilikom izmene podataka");
    }
}
