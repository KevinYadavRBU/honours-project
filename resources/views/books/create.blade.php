@extends('layouts.app')

@section('title', 'Add book')

@section('content')
    <h1>Add book</h1>

    <form method="POST" action="{{ route('books.store') }}" class="book-form">
        @include('books.form')

        <div class="form-actions">
            <button type="submit" class="button">Save book</button>
            <a href="{{ route('books.index') }}" class="cancel-link">Cancel</a>
        </div>
    </form>
@endsection
