<?php

namespace App\Http\Controllers\Backend\Access;

use App\Http\Requests\backend\access\roles\CreateRoleRequest;
use App\Http\Requests\backend\access\roles\EditPermissionsRequest;
use App\Repositories\Permissions\PermissionsRepositoryContract;
use App\Repositories\Roles\RolesRepositoryContract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JavaScript;


class rolesController extends Controller
{
    /**
     * @var RolesRepositoryContract
     */
    private $roles;
    private $permissions;

    public function __construct(RolesRepositoryContract $roles, PermissionsRepositoryContract $permissions)
    {

        $this->roles = $roles;
        $this->permissions = $permissions;
    }

    public function index(){
        $roles = $this->roles->withCount('perms')->all();

        JavaScript::put(
            ['roles' => $roles]
        );

        return view('backend.access.roles.index')->with([
            'vueView' => 'access-roles-index'
        ]);
    }


    /**
     * Retrieve role and permissions then send the user to the manage
     * role view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function permissions($id){
        $rolesPermissions = $this->roles->select(['id', 'display_name'])->with('perms')->getById($id);

        $allPermissions = $this->permissions->all();

        JavaScript::put(
            [
                'role' => $rolesPermissions,
                'permissions' => $allPermissions
            ]
        );

        return view('backend.access.roles.managePermissions')->with([
           'vueView' => 'access-roles-permissions'
        ]);
    }

    /**
     * Retrieve permissions for form and then show the
     * user the creation view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(){
        $allPermissions = $this->permissions->all();

        JavaScript::put(
            [
                'permissions' => $allPermissions
            ]
        );

        return view('backend.access.roles.create')->with([
            'vueView' => 'access-roles-create'
        ]);
    }

    /**
     * Called upon the create form being submitted and
     * then creates the role with permissions
     *
     * @param CreateRoleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createRole(CreateRoleRequest $request){
        $this->roles->createWithPermissions([
            'name'  =>  $request['role.name'],
            'display_name'  =>  $request['role.display_name'],
            'description'   =>  $request['role.description'],
            'permissions'   =>  $request['permissions']
        ]);

        return response()->json(['result' => 'Success']);
    }

    /**
     * Called when POST request is made to a role which
     * then updates the roles display_name and permissions
     *
     * @param EditPermissionsRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePermissions(EditPermissionsRequest $request, $id){
        $input = $request->all();

        // Update the name of the role
        $this->roles->updateById($id, ['display_name' => $input['role']['display_name']]);

        // Call roles repository and sync permissions
        $this->roles->syncPermissions($id, $input['permissions']);

        // Return the user the good news
        return response()->json(['result' => 'Success']);
    }

    public function delete($id){
        $this->roles->deleteById($id);

    }
}
