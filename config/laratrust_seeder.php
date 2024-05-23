<?php

return [

    'truncate_tables' => true,

    'roles_structure' => [
        'super_admin' => [
            'admins' => 'c,r,u,d',
            'roles' => 'c,r,u,d',
            'items' => 'c,r,u,d',
            'types' => 'c,r,u,d',
            'models' => 'c,r,u,d',
            'mainPlaces' => 'c,r,u,d',
            'subPlaces' => 'c,r,u,d',
            'reports' => 'c,r,u,d',
            'settings' => 'c,r,u,d',
         ],

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
