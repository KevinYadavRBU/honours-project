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
    ])
        ->assertRedirect(route('books.index'))
        ->assertSessionHas('success', 'Book added successfully.');

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

it('shows the current values in the edit form', function () {
    $book = Book::factory()->create([
        'title' => 'The Hobbit',
        'author' => 'J.R.R. Tolkien',
        'status' => 'reading',
    ]);

    $this->get(route('books.edit', $book))
        ->assertOk()
        ->assertSee('value="The Hobbit"', false)
        ->assertSee('value="J.R.R. Tolkien"', false)
        ->assertSee('value="reading"', false);
});

it('updates a book with valid values', function () {
    $book = Book::factory()->create([
        'title' => 'Old title',
        'author' => 'Old author',
        'status' => 'to-read',
    ]);

    $this->put(route('books.update', $book), [
        'title' => 'New title',
        'author' => 'New author',
        'status' => 'finished',
    ])
        ->assertRedirect(route('books.index'))
        ->assertSessionHas('success', 'Book updated successfully.');

    $this->assertDatabaseHas('books', [
        'id' => $book->id,
        'title' => 'New title',
        'author' => 'New author',
        'status' => 'finished',
    ]);
});

it('rejects invalid values when updating a book', function () {
    $book = Book::factory()->create();

    $this->from(route('books.edit', $book))
        ->put(route('books.update', $book), [
            'title' => 'Valid title',
            'author' => '',
            'status' => 'to-read',
        ])
        ->assertRedirect(route('books.edit', $book))
        ->assertSessionHasErrors('author');
});

it('shows edit and confirmed delete actions for each book', function () {
    $book = Book::factory()->create();

    $this->get(route('books.index'))
        ->assertOk()
        ->assertSee(route('books.edit', $book))
        ->assertSee('onsubmit="return confirm(\'Are you sure?\')"', false)
        ->assertSee('name="_method" value="DELETE"', false);
});

it('deletes a book and returns to the list', function () {
    $book = Book::factory()->create();

    $this->delete(route('books.destroy', $book))
        ->assertRedirect(route('books.index'));

    $this->assertDatabaseMissing('books', [
        'id' => $book->id,
    ]);
});
