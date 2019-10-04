<?php
namespace App\Repositories\Author;

use App\Repositories\BaseRepository;

class AuthorRepository extends BaseRepository implements AuthorRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Author::class;
    }
}
