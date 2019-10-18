<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\RequestNewbook;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Enums\Status;
use App\Repositories\RequestNewBook\RequestNewBookRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;

class RequestBookController extends Controller
{
    protected $requestNewBookRepo;
    protected $userRepo;

    public function __construct(
        RequestNewBookRepositoryInterface $requestNewBookRepo,
        UserRepositoryInterface $userRepo
    ) {
        $this->requestNewBookRepo = $requestNewBookRepo;
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        $requestBook = $this->requestNewBookRepo->getAll();

        return view('admin.book.requestbook', compact('requestBook'));
    }

    public function edit($id)
    {
        $book = $this->requestNewBookRepo->find($id);
        if ($book == false){
            return view('errors.notfound');
        }
        $data = [
            'bookInfo' => $book,
            'user_name' => $book->user->name,
        ];
        if ($data == false){
            return view('errors.notfound');
        }
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $newbook = $this->requestNewBookRepo->find($id);
        if ($newbook == false){
            return view('errors.notfound');
        }
        $newbook->status = $request->status;
        $newbook->save();
        $returnHTML = view('admin.book.requestbookByAjax')->with('newbook', $newbook)->render();

        return response()->json([
            'id' => $newbook->id,
            'returnHTML' => $returnHTML,
        ]);
    }
}
