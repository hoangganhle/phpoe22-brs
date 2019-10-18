<?php
namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Repositories\User\UserRepositoryInterface;
use Auth;
use Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function getAuthId()
    {
        return Auth::user()->id;
    }

    public function getAuth()
    {
        return Auth::user();
    }

    public function getFollowers()
    {
        $userFollowers = $this->model
            ->find($this->getAuthId())
            ->userfollows
            ->pluck('follower');

        $followers = $this->model
            ->whereIn('id', $userFollowers)
            ->get();

        return $followers;

    }

    public function getListAdminsToSendNotice($listUser)
    {
        return $this->model->whereIn('id', $listUser)->get();
    }

    public function markUserAsReadNotice($idNotice)
    {
        return Auth::user()
            ->notifications
            ->where('id', $idNotice)
            ->first()
            ->markAsRead();
    }

    public function deleteNoticeIfSenderDeleteNotice($idNotice)
    {
        return Auth::user()
            ->notifications
            ->where('id', $idNotice)
            ->first()
            ->delete();
    }

    public function getRoles($idUsersHasrole)
    {
        return $this->model->get()->load('roles')->whereIn('id', $idUsersHasrole);
    }

    public function checkMail($email)
    {
        return $this->model->where('email', $email)->count();
    }

    public function createUser($request = [])
    {
        return $this->model->firstOrCreate([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
    }

    public function getRoleUser($id)
    {
        return $this->model->find($id)->roles()->pluck('id')->toArray();
    }
}
