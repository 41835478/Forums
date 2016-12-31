<?php
namespace App\Repositories\Roles;
use App\Repositories\Base\BaseRepository;
use App\Role;

/**
 * Created by PhpStorm.
 * User: KyleN
 * Date: 29/12/2016
 * Time: 01:29
 */
class RolesRepository extends BaseRepository implements RolesRepositoryContract
{
    protected $model = Role::class;

    public function __construct()
    {
        $this->model = app()->make($this->model);
    }

    /**
     * Syncs permissions for given role id
     *
     * @param $id
     * @param array $permissions
     * @return mixed
     */
    public function syncPermissions($id, Array $permissions)
    {
        return $this->syncPermissionsToModel($this->getById($id), $permissions);
    }

    public function createWithPermissions(Array $data)
    {
        $model = $this->create([
            'name'  =>  $data['name'],
            'display_name'  =>  $data['display_name'],
            'description'   =>  $data['description']
        ]);

        $this->syncPermissionsToModel($model, $data['permissions']);

        return $model;
    }

    protected function syncPermissionsToModel($model, Array $permissions){
        return $model->perms()->sync($permissions);
    }
}