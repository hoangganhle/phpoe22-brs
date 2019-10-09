<?php
namespace App\Repositories\Publisher;

use App\Repositories\BaseRepository;

class PublisherRepository extends BaseRepository implements PublisherRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Publisher::class;
    }

}
