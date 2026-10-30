@extends('layouts.app')

@section('title', 'Books')

@section('content')
    <div class="page-heading">
        <h1>Reading list</h1>
        <a href="{{ route('books.create') }}" class="button">Add book</a>
    </div>

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
                    <p class="book-status">{{ \App\Models\Book::STATUSES[$book->status] ?? $book->status }}</p>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
