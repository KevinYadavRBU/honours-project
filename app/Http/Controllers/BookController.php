<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        $books = Book::query()->latest('id')->get();

        return view('books.index', [
            'books' => $books,
        ]);
    }
}
