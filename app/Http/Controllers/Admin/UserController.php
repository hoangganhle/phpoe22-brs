<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManageUserRequest;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\RoleUser\RoleUserRepositoryInterface;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $userRepo;
    protected $roleRepo;
    protected $roleUserRepo;

    public function __construct(UserRepositoryInterface $userRepo, RoleRepositoryInterface $roleRepo, RoleUserRepositoryInterface $roleUserRepo)
    {
        $this->userRepo = $userRepo;
        $this->roleRepo = $roleRepo;
        $this->roleUserRepo = $roleUserRepo;
        $this->middleware('permission:manage-users');
    }

    public function index()
    {
        $id_user_hasrole = $this->roleUserRepo->getUserID();
        $users = $this->userRepo->getRoles($id_user_hasrole);

        return view('admin.user.list-users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleRepo->getAll();

        return view('admin.user.form-create-user', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManageUserRequest $request)
    {
        $emailAreadyExist = $this->userRepo->checkMail($request->get('email'));
        if ($emailAreadyExist != 0){
            return redirect()->back()->with('status', trans('admin.email_aready_exist'));
        };

        $user = $this->userRepo->createUser($request->all());

        $roles = $request->get('role');
        foreach ($roles as $role){
            $user->roles()->attach($role);
        };

       return redirect()->route('user.index')->with('status', trans('admin.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepo->find($id);
        if ($user == false){
            return view('errors.notfound');
        }
        $roles = $this->roleRepo->getAll();
        $role_users = $this->userRepo->getRoleUser($id);

        return view('admin.user.form-update-user', compact('user', 'roles', 'role_users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManageUserRequest $request, $id)
    {
        $user = $this->userRepo->find($id);
        if ($user == false){
            return view('errors.notfound');
        }
        $data = [];
        $data['name'] = $request->get('name');
        $this->userRepo->update($id, $data);
        $user->roles()->sync([]);
        foreach ($request->get('role') as $role){
            $user->attachRole($role);
        }

        return redirect()->route('user.index')->with('status', trans('admin.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->userRepo->find($id);
        $user->roles()->sync([]);
        $this->userRepo->delete($id);

        return redirect()->back()->with('status', trans('admin.delete_success'));
    }
}
