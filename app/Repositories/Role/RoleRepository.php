<?php
namespace App\Repositories\Role;

use App\Repositories\BaseRepository;
use App\Repositories\Role\RoleRepositoryInterface;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Role::class;
    }

    public function getAllRoles()
    {
        return $this->model->get()->load('perms');
    }
}
