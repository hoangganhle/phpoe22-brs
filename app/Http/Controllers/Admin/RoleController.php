<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\Permission\PermissionRepositoryInterface;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $roleRepo;
    protected $permissRepo;

    public function __construct(RoleRepositoryInterface $roleRepo, PermissionRepositoryInterface $permissRepo)
    {
        $this->roleRepo = $roleRepo;
        $this->permissRepo = $permissRepo;
        $this->middleware('permission:manage-roles');
    }

    public function index()
    {
        $roles = $this->roleRepo->getAllRoles();

        return view('admin.role.list-roles', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = $this->permissRepo->getAll();

        return view('admin.role.form-create-role', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $role = $this->roleRepo->create($data);

        foreach ($request->get('permission') as $permission){
            $role->attachPermission($permission);
        }

        return redirect(route('role.index'))->with('status', trans('admin.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = $this->roleRepo->find($id);
        if ($role == false) {
            return view('errors.notfound');
        }
        $permissions = $this->permissRepo->getAll();
        $role_permissions = $this->roleRepo->getPermissionsOfRole($id);

        return view('admin.role.form-update-role', compact('role', 'permissions', 'role_permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = $this->roleRepo->find($id);
        if ($role == false) {
            return view('errors.notfound');
        }
        $data = $request->all();
        $role = $this->roleRepo->update($id, $data);
        $role->perms()->sync([]);

        foreach ($request->get('permission') as $permission){
            $role->attachPermission($permission);
        }

        return redirect(route('role.index'))->with('status', trans('admin.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = $this->roleRepo->find($id);
        if ($role == false) {
            return view('errors.notfound');
        }
        $this->roleRepo->delete($id);
        $role->users()->sync([]);
        $role->perms()->sync([]);

        return redirect()->back()->with('status', trans('admin.delete_success'));
    }
}
