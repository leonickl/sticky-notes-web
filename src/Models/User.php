<?php

namespace App\Models;

use PXP\Data\Model;

/**
 * @property int $id
 * @property string $username
 * @property string $password_hash
 *
 * @property string $nc_url
 * @property string $nc_user
 * @property string $nc_pass
 * @property string $nc_dir
 */
class User extends Model
{
    protected string $table = 'users';

    public function setPasswordHash(string $password)
    {
        $this->password_hash = password_hash($password, PASSWORD_DEFAULT);
    }
}
