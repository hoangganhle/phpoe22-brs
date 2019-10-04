<?php
namespace App\Repositories\Book;

interface BookRepositoryInterface
{
    public function findPublisherByBook($book);

    public function findCategoryByBook($book);

    public function findAuthorByBook($book);
}
