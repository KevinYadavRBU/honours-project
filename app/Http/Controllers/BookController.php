<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(Request $request): View
    {
        $requestedStatus = $request->query('status');
        $activeStatus = is_string($requestedStatus) && array_key_exists($requestedStatus, Book::STATUSES)
            ? $requestedStatus
            : null;

        $booksQuery = Book::query()->latest('id');

        if ($activeStatus !== null) {
            $booksQuery->where('status', $activeStatus);
        }

        return view('books.index', [
            'books' => $booksQuery->get(),
            'activeStatus' => $activeStatus,
        ]);
    }

    public function create(): View
    {
        return view('books.create');
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()->route('books.index');
    }

    public function edit(Book $book): View
    {
        return view('books.edit', [
            'book' => $book,
        ]);
    }

    public function store(BookRequest $request): RedirectResponse
    {
        Book::create($request->validated());

        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }

    public function update(BookRequest $request, Book $book): RedirectResponse
    {
        $book->update($request->validated());

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }
}
