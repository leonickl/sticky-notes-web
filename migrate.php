<?php

require __DIR__.'/vendor/autoload.php';

$db = \PXP\Data\DB::init();

$db->create('users', [
    'username' => 'text not null',
    'password_hash' => 'text not null',
]);
