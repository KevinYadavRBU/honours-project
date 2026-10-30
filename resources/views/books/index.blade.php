@extends('layouts.app')

@section('title', 'Books')

@section('content')
    <div class="page-heading">
        <h1>Reading list</h1>
        <a href="{{ route('books.create') }}" class="button">Add book</a>
    </div>

    <nav class="status-filters" aria-label="Filter books by status">
        <a href="{{ route('books.index') }}" @class(['active' => $activeStatus === null])>All</a>
        @foreach (\App\Models\Book::STATUSES as $value => $label)
            <a href="{{ route('books.index', ['status' => $value]) }}" @class(['active' => $activeStatus === $value])>{{ $label }}</a>
        @endforeach
    </nav>

    @if ($books->isEmpty())
        <p>No books yet.</p>
    @else
        <ul class="book-list">
            @foreach ($books as $book)
                <li class="book-item">
                    <div class="book-details">
                        <p class="book-title">{{ $book->title }}</p>
                        <p class="book-author">{{ $book->author }}</p>
                    </div>
                    <div class="book-actions">
                        <p class="book-status">{{ \App\Models\Book::STATUSES[$book->status] ?? $book->status }}</p>
                        <a href="{{ route('books.edit', $book) }}">Edit</a>
                        <form method="POST" action="{{ route('books.destroy', $book) }}" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button button-danger">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
