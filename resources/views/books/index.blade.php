@extends('layouts.app')

@section('title', 'Books')

@section('content')
    <h1 class="text-2xl font-semibold">Reading list</h1>

    @if ($books->isEmpty())
        <p class="mt-6 text-stone-600">No books yet.</p>
    @else
        <ul class="mt-6 divide-y divide-stone-200 rounded-lg border border-stone-200 bg-white">
            @foreach ($books as $book)
                <li class="flex flex-col gap-1 px-4 py-4 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="font-medium">{{ $book->title }}</p>
                        <p class="text-sm text-stone-600">{{ $book->author }}</p>
                    </div>
                    <p class="text-sm text-stone-700">{{ \App\Models\Book::STATUSES[$book->status] ?? $book->status }}</p>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
