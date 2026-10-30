@extends('layouts.app')

@section('title', 'Edit book')

@section('content')
    <h1>Edit book</h1>

    <form method="POST" action="{{ route('books.update', $book) }}" class="book-form">
        @method('PUT')
        @include('books._form', ['book' => $book])

        <div class="form-actions">
            <button type="submit" class="button">Save changes</button>
            <a href="{{ route('books.index') }}" class="cancel-link">Cancel</a>
        </div>
    </form>
@endsection
