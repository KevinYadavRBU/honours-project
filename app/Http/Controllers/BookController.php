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
        $status = $request->query('status');
        $activeStatus = is_string($status) && isset(Book::STATUSES[$status]) ? $status : null;

        $books = Book::query()
            ->when($activeStatus, fn ($query) => $query->where('status', $activeStatus))
            ->latest('id')
            ->get();

        return view('books.index', [
            'books' => $books,
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
