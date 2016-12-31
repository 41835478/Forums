<?php
/**
 * Created by PhpStorm.
 * User: KyleN
 * Date: 29/12/2016
 * Time: 01:32
 */

namespace App\Repositories\Roles;


interface RolesRepositoryContract
{
    public function syncPermissions($id, Array $permissions);

    public function createWithPermissions(Array $data);
}