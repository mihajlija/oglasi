<?php
    class MainController extends Controller {
        
        //osnovni metod pocetne strane
        function index($page = 0) {
            $this->set('locations', LocationModel::getAll() );
            $positions = PositionModel::getAllPaged($page);
            for ($i=0;$i<count($positions);$i++) {
            $positions[$i]->location = LocationModel::getById($positions[$i]->location_id);
        }
            $this->set('positions', $positions);
        }

        public function login() {
            if (isset($_POST['loginBtn'])) {
                $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_EMAIL);
                $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
                
                if (!preg_match('/^.{6,64}$/', $username) or !preg_match('/^.{6,255}$/', $password)) {
                    $this->set('message', 'Parametri za prijavu nisu ispravni!');
                    return;
                }

                $hash = hash('sha512', $password . Configuration::USER_SALT);
                $password = '000000000000000000000000000000000000000000000000000';

                $user = UserModel::getByUsernameAndPasswordHash($username, $hash);
                $hash = '0000000000000000000000000000000000000000000000000000000';

                if ($user) {
                    Session::set('user_id', $user->user_id);
                    Session::set('username', $username);
                    Session::set('ip', filter_input(INPUT_SERVER, 'REMOTE_ADDR'));
                    Session::set('ua', filter_input(INPUT_SERVER, 'HTTP_USER_AGENT', FILTER_SANITIZE_STRING));

                    Misc::redirect('admin/positions');
                } else {
                    $this->set('message', 'Nisu dobri login parametri.');
                    sleep(1);
                }
            }
        }
        public function logout() {
            Session::end();
            Misc::redirect('login');
        }
        
        
        // salje view-u spisak oglasa sa lokacije sa zadatim slugom 
        function listByLocation($locationSlug) {
            $location = LocationModel::getBySlug($locationSlug);
            
            // If the location doesn't exist redirect the user to homepage 
            if (!$location) {
                Misc::redirect('');
            }
            
            $this->set('locations', LocationModel::getAll() );

            $positions = PositionModel::getPositionsByLocationId($location->location_id);
            for ($i=0;$i<count($positions);$i++) {
                $positions[$i]->location = LocationModel::getById($positions[$i]->location_id);
            }
            $this->set('positions', $positions);

        }
        
        function position($slug) {
            $position = PositionModel::getBySlug($slug);
            
            //ako ne postoji element sa tim slugom vrati usera na homepage
            if (!$position) {
                Misc::redirect('');
            }
            
            $this->set('position', $position);
           
        }
    }
