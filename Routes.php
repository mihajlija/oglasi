<?php
    return [
        [
            'Pattern'    => '|^login/?$|',
            'Controller' => 'Main',
            'Method'     => 'login'
        ],
        [
            'Pattern'    => '|^logout/?$|',
            'Controller' => 'Main',
            'Method'     => 'logout'
        ],
        [
            'Pattern'    => '|^admin/locations/?$|',
            'Controller' => 'AdminLocation',
            'Method'     => 'index'   
        ],
        [
            'Pattern'    => '|^admin/locations/add/?$|',
            'Controller' => 'AdminLocation',
            'Method'     => 'add'   
        ],        
        [
            'Pattern'    => '|^admin/locations/edit/([0-9]+)/?$|',
            'Controller' => 'AdminLocation',
            'Method'     => 'edit'   
        ],
        [
            'Pattern'    => '|^admin/keywords/?$|',
            'Controller' => 'AdminKeyword',
            'Method'     => 'index'   
        ],
        [
            'Pattern'    => '|^admin/keywords/add/?$|',
            'Controller' => 'AdminKeyword',
            'Method'     => 'add'   
        ],        
        [
            'Pattern'    => '|^admin/keywords/edit/([0-9]+)/?$|',
            'Controller' => 'AdminKeyword',
            'Method'     => 'edit'   
        ],
        [
            'Pattern'    => '|^admin/positions/?$|',
            'Controller' => 'AdminPosition',
            'Method'     => 'index'   
        ],
        [
            'Pattern'    => '|^admin/positions/add/?$|',
            'Controller' => 'AdminPosition',
            'Method'     => 'add'   
        ],        
        [
            'Pattern'    => '|^admin/positions/edit/([0-9]+)/?$|',
            'Controller' => 'AdminPosition',
            'Method'     => 'edit'   
        ],
        [
            'Pattern'    => '|^location/([a-z0-9\-]+)/?$|',
            'Controller' => 'Main',
            'Method'     => 'listByLocation'  
        ],
        [
            'Pattern'    => '|^position/([a-z0-9\-]+)/?$|',
            'Controller' => 'Main',
            'Method'     => 'position'  
        ],
        [
            'Pattern'    => '|^([0-9]+)?/?$|',
            'Controller' => 'Main',
            'Method'     => 'index'
        ],
        [
            'Pattern'    => '|^.*$|',
            'Controller' => 'Main',
            'Method'     => 'index'
        ]
    ];
