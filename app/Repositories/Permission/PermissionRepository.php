<?php
namespace App\Repositories\Permission;

use App\Repositories\BaseRepository;
use App\Repositories\Permission\PermissionRepositoryInterface;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Permission::class;
    }

    public function getPermissionsOfRoles($id)
    {
        return $this->model->find($id)->perms()->pluck('id')->toArray();
    }
}
