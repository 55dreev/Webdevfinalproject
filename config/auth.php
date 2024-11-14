<?php

return [

    'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],
    
    // Custom Admin Guard
    'admin' => [
        'driver' => 'session',
        'provider' => 'admins',
    ],
],

'providers' => [
    'users' => [
        'driver' => 'eloquent',
        'model' => App\Models\User::class,
    ],
    
    // Admin Provider (Make sure to create this model)
    'admins' => [
        'driver' => 'eloquent',
        'model' => App\Models\Admin::class,
    ],
],

];
