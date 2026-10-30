<?php

use App\Models\Book;

it('renders a friendly message when there are no books', function () {
    $this->get(route('books.index'))
        ->assertOk()
        ->assertSee('No books yet.');
});

it('shows every book title, author and status', function () {
    $book = Book::factory()->toRead()->create([
        'title' => 'The Hobbit',
        'author' => 'J.R.R. Tolkien',
    ]);

    $this->get(route('books.index'))
        ->assertOk()
        ->assertSee('The Hobbit')
        ->assertSee('J.R.R. Tolkien')
        ->assertSee('To read')
        ->assertDontSee('No books yet.');
});
