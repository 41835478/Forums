<?php
/**
 * Created by PhpStorm.
 * User: KyleN
 * Date: 29/12/2016
 * Time: 13:38
 */

namespace App\Repositories\Permissions;


use App\Permission;
use App\Repositories\Base\BaseRepository;

class PermissionsRepository extends BaseRepository implements PermissionsRepositoryContract
{
    protected $model = Permission::class;

    public function __construct()
    {
        $this->model = app()->make($this->model);
    }

}