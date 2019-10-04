<?php

namespace Tests\Unit\Http\Admin\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Admin\BookController;
use App\Http\Requests\BookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Repositories\Book\BookRepositoryInterface;
use App\Repositories\Author\AuthorRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Publisher\PublisherRepositoryInterface;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery as m;

class BookControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    private $bookRepo;
    private $authorRepo;
    private $cateRepo;
    private $pubRepo;
    private $requestBook;
    private $updateRequestBook;

    public function setUp(): void
    {
        parent::setup();
        $this->bookRepo = m::mock(BookRepositoryInterface::class);
        $this->authorRepo = m::mock(AuthorRepositoryInterface::class);
        $this->cateRepo = m::mock(CategoryRepositoryInterface::class);
        $this->pubRepo = m::mock(PublisherRepositoryInterface::class);
        $this->requestBook = m::mock(BookRequest::class);
        $this->updateRequestBook = m::mock(UpdateBookRequest::class);
    }

    public function tearDown(): void
    {
        m::close();
        parent::tearDown();
    }

    public function testIndex()
    {
        $controller = new BookController($this->bookRepo, $this->authorRepo, $this->cateRepo, $this->pubRepo);

        $this->bookRepo->shouldReceive('getAll')->once()->andReturn(array());
        $view = $controller->index();

        $this->assertEquals('admin.book.index', $view->getName());
        $this->assertArrayHasKey('book', $view->getData());
    }

    public function testCreate()
    {
        $controller = new BookController($this->bookRepo, $this->authorRepo, $this->cateRepo, $this->pubRepo);

        $this->authorRepo->shouldReceive('getAll')->once()->andReturn(array());
        $this->cateRepo->shouldReceive('getAll')->once()->andReturn(array());
        $this->pubRepo->shouldReceive('getAll')->once()->andReturn(array());
        $view = $controller->create();

        $this->assertEquals('admin.book.create', $view->getName());
        $this->assertArrayHasKey('publishers', $view->getData());
        $this->assertArrayHasKey('categories', $view->getData());
        $this->assertArrayHasKey('authors', $view->getData());
    }

    public function testStore()
    {
        $controller = new BookController($this->bookRepo, $this->authorRepo, $this->cateRepo, $this->pubRepo);

        $this->requestBook->shouldReceive('all')->once()->andReturn(array());
        $this->bookRepo->shouldReceive('create')->once()->andReturn(new Book());
        $this->requestBook->shouldReceive('get')->once()->andReturn(array());

        $response = $controller->store($this->requestBook);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('book.index'), $response->headers->get('location'));
    }

    public function testShow()
    {
        $id = 1;
        $controller = new BookController($this->bookRepo, $this->authorRepo, $this->cateRepo, $this->pubRepo);

        $this->bookRepo->shouldReceive('find')->once()->andReturn($id);
        $view = $controller->show($id);

        $this->assertEquals('admin.book.show', $view->getName());
        $this->assertArrayHasKey('data', $view->getData());
    }

    public function testEdit()
    {
        $id = 1;
        $controller = new BookController($this->bookRepo, $this->authorRepo, $this->cateRepo, $this->pubRepo);

        $this->bookRepo->shouldReceive('find')->once()->andReturn(new Book());
        $this->authorRepo->shouldReceive('getAll')->once()->andReturn(array());
        $this->cateRepo->shouldReceive('getAll')->once()->andReturn(array());
        $this->pubRepo->shouldReceive('getAll')->once()->andReturn(array());
        $this->bookRepo->shouldReceive('findPublisherByBook')->once()->andReturn();
        $this->bookRepo->shouldReceive('findCategoryByBook')->once()->andReturn();
        $this->bookRepo->shouldReceive('findAuthorByBook')->once()->andReturn();

        $view = $controller->edit($id);

        $this->assertEquals('admin.book.edit', $view->getName());
        $this->assertArrayHasKey('data', $view->getData());
        $this->assertArrayHasKey('categories', $view->getData());
        $this->assertArrayHasKey('authors', $view->getData());
        $this->assertArrayHasKey('publishers', $view->getData());
        $this->assertArrayHasKey('book_category', $view->getData());
        $this->assertArrayHasKey('book_authors', $view->getData());
        $this->assertArrayHasKey('book_publisher', $view->getData());
    }

    public function testUpdate()
    {
        $id = 1;
        $controller = new BookController($this->bookRepo, $this->authorRepo, $this->cateRepo, $this->pubRepo);
        $this->bookRepo->shouldReceive('find')->once()->andReturn(new Book());
        $this->updateRequestBook->shouldReceive('all')->once()->andReturn(array());
        $this->updateRequestBook->shouldReceive('get')->once()->andReturn(array());
        $this->bookRepo->shouldReceive('update')->once()->andReturn(new Book());

        $response = $controller->update($this->updateRequestBook, $id);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('book.index'), $response->headers->get('location'));

    }

    public function testDelete()
    {
        $id = 1;
        $controller = new BookController($this->bookRepo, $this->authorRepo, $this->cateRepo, $this->pubRepo);
        $this->bookRepo->shouldReceive('find')->once()->andReturn(new Book());
        $this->bookRepo->shouldReceive('delete')->once()->andReturn();

        $response = $controller->destroy($id);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('book.index'), $response->headers->get('location'));

    }
}
