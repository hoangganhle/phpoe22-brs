<?php
namespace App\Repositories\Book;

use App\Repositories\BaseRepository;

class BookRepository extends BaseRepository implements BookRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Book::class;
    }

    public function findPublisherByBook($book)
    {
        return $this->model->find($book)->publisher->id;
    }

    public function findCategoryByBook($book)
    {
        return $this->model->find($book)->publisher->id;
    }

    public function findAuthorByBook($book)
    {
        return $this->model->find($book)->authors->pluck('id')->toArray();
    }
}
