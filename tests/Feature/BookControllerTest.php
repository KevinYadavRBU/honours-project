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

it('creates a book from the form and returns to the list', function () {
    $this->post(route('books.store'), [
        'title' => 'Dune',
        'author' => 'Frank Herbert',
        'status' => 'reading',
    ])->assertRedirect(route('books.index'));

    $this->assertDatabaseHas('books', [
        'title' => 'Dune',
        'author' => 'Frank Herbert',
        'status' => 'reading',
    ]);
});

it('shows validation errors and keeps the typed values', function () {
    $this->from(route('books.create'))
        ->post(route('books.store'), [
            'title' => 'Kept Title',
            'author' => '',
            'status' => 'skipped',
        ])
        ->assertRedirect(route('books.create'))
        ->assertSessionHasErrors(['author', 'status'])
        ->assertSessionHasInput('title', 'Kept Title');
});
