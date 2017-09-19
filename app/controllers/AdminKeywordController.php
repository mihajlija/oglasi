<?php

/*
 * Admin panel controller class for handling keywords
 */

class AdminKeywordController extends AdminController {
    
    /*
     * Controller method that displays all keywords
     */
    public function index() {
        $this->set('keywords', KeywordModel::getAll());
    }
    
    /* Adds keyword data if it's succesfully sent via HTTP POST
     * @return void
     */
    public function add() {
        if (!$_POST) return;
        $name = filter_input(INPUT_POST, 'name');
        $slug = filter_input(INPUT_POST, 'slug');
        
        $keyword_id = KeywordModel::add($name, $slug);
        
        // If the location was added successfully redirect the user
        if ($keyword_id) {
            Misc::redirect('admin/keywords/');
        } else {
            $this->set('message', "Doslo je do greske prilikom dodavanja lokacije u bazu podataka");
        }
    }
    
     /** 
     * Edits keyword data if it's successfully sent via HTTP POST
     *@param $id int
     * @return void
     */
    public function edit($id) {
        $keyword = KeywordModel::getById($id);
        
        if (!$keyword) {
            Misc::redirect('admin/keywords/');
        }
        $this->set('keyword', $keyword);
        if(!$_POST) return; //Check if the user entered an ID 
        
        $name = filter_input(INPUT_POST, 'name');
        $slug = filter_input(INPUT_POST, 'slug');
        
        $res = KeywordModel::edit($id, $name, $slug);
        
         // If the location was added successfully, redirect the user
        if ($res) {
            Misc::redirect('admin/keywords/');
        } else {
            $this->set('message', "Doslo je do greske prilikom izmene podataka");
        }
    }
    
    
}
