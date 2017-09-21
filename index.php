<?php
    require_once './Configuration.php';
    require_once './vendor/autoload.php';

    use \Mihajlija\Oglasi\Sys\Session as Session;
    use \Mihajlija\Oglasi\Sys\Misc as Misc;
    use \Milantex\DAW\DataBase;

    ob_start();
    
    Session::begin();

    # These two are only a temporary fix for class referencing problems in views
    $SESSION = new Session();
    $Misc = new Misc;

    $uriWithBase = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);
    $uri = substr($uriWithBase, strlen(Configuration::BASE_PATH));

    $Routes = require_once 'Routes.php';
    $FoundRoute = null;
    $Arguments = [];

    foreach ($Routes as $Route) {
        if (preg_match($Route['Pattern'], $uri, $Arguments)) {
            $FoundRoute = $Route;
            break;
        }
    }

    unset($Arguments[0]);

    $Controller = $FoundRoute['Controller'];
    $Method = $FoundRoute['Method'];

    $fileName = 'app/controllers/' . $Controller . 'Controller.php';
    if (!file_exists($fileName)) {
        $Controller = 'Main';
        $fileName = 'app/controllers/' . $Controller . 'Controller.php';
    }

    $dataBase = new DataBase(\Configuration::DB_HOST, \Configuration::DB_NAME, \Configuration::DB_USER, \Configuration::DB_PASS);

    $className = '\\Mihajlija\\Oglasi\\App\\Controllers\\' . $Controller . 'Controller';
    $worker = new $className();

    $Method = method_exists($worker, $Method)?$Method:'index';

    call_user_func_array([$worker, '__pre'], []);
    call_user_func_array([$worker, $Method], $Arguments);

    // Data from the controller response 
    $DATA = $worker->getData();

    if ($worker instanceof ApiController) {
        ob_clean();
        header('Content-type: application/json; charset=utf-8');

        $urlComponents = parse_url(\Configuration::BASE_URL);
        $origin = $urlComponents['scheme'].'://'.$urlComponents['host'].((isset($urlComponents['port']))?':'.$urlComponents['port']:'');
        header('Access-Control-Allow-Origin: ' . $origin);

        echo json_encode($DATA, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit;
    }

    require_once 'app/views/'.$Controller.'/'.$Method.'.php';
