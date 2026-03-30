<?php

require __DIR__.'/vendor/autoload.php';

$db = \PXP\Data\DB::init();

$db->create('users', [
    'username' => 'text not null',
    'password_hash' => 'text not null',
]);

$db->addColumns('users', [
    'nc_url' => 'text not null',
    'nc_user' => 'text not null',
    'nc_pass' => 'text not null',
    'nc_dir' => 'text not null',
]);
