<?php

use PXP\Auth\Models\Identity;
use PXP\Auth\Models\User;

return [
    'title' => 'Sticky Notes',
    'app-url' => env('APP_URL', 'http://localhost:8096'),
    'port' => env('APP_PORT', 8096),

    'note-dir' => env('NOTE_DIR'),

    'css' => [
        'media',
        'colors',
        'base',
        'snippets',
        'button',
        'notification',
        'components',
        'form',
        'notes',
    ],

    'mail' => (object) [
        'host' => env('MAIL_HOST'),
        'user' => env('MAIL_USER'),
        'pass' => env('MAIL_PASS'),
        'port' => env('MAIL_PORT'),
    ],

    'modules' => [
        'auth' => 'leonickl/pxp-auth',
    ],

    'resolver' => [
        Identity::class => User::class,
    ],

    'pwa' => [
        'name' => 'Sticky Notes Web',
        'short' => 'Sticky',
        'description' => 'A web client for viewing sticky notes created by com.vixalien.sticky',
    ],
];
