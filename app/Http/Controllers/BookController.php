<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
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

    public function create(): View
    {
        return view('books.create');
    }

    public function store(BookRequest $request): RedirectResponse
    {
        Book::create($request->validated());

        return redirect()->route('books.index');
    }
}
