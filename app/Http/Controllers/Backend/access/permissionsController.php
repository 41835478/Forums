<?php

namespace App\Http\Controllers\Backend\access;

use App\Http\Requests\backend\access\permissions\createPermissionRequest;
use App\Http\Requests\backend\access\permissions\updatePermissionRequest;
use App\Repositories\Permissions\PermissionsRepositoryContract;
use App\Repositories\Roles\RolesRepositoryContract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JavaScript;

class permissionsController extends Controller
{
    private $permissions;
    private $roles;

    public function __construct(PermissionsRepositoryContract $permissions, RolesRepositoryContract $roles){
        $this->permissions = $permissions;
        $this->roles = $roles;
    }

    public function index(){
        $permissions = $this->permissions->all();

        JavaScript::put([
           'permissions' => $permissions
        ]);

        return View('backend.access.permissions.index')->with([
            'vueView' => 'access-permissions-index'
        ]);
    }

    public function store(createPermissionRequest $request){
        $this->permissions->create($request->all());
        return response()->json(['result' => 'Success']);
    }

    public function delete($id){
        $this->permissions->deleteById($id);
        return response()->json(['result' => 'Success']);
    }

    public function update(updatePermissionRequest $request){
        $input = $request->all();

        $this->permissions->updateById($input['id'], [
            'name' => $input['name'],
            'display_name' => $input['display_name'],
            'description' => $input['description']
        ]);

        return response()->json(['result' => 'Success']);
    }
}
