@extends('layouts.app')

@section('title', 'Add book')

@section('content')
    <h1 class="text-2xl font-semibold">Add book</h1>

    <form method="POST" action="{{ route('books.store') }}" class="mt-6 flex flex-col gap-4">
        @include('books.form')

        <div class="flex items-center gap-4">
            <button type="submit" class="rounded-md bg-stone-900 px-4 py-2 text-sm font-medium text-white">Save book</button>
            <a href="{{ route('books.index') }}" class="text-sm text-stone-600 underline">Cancel</a>
        </div>
    </form>
@endsection
