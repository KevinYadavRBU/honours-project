<?php

test('the home page redirects to the books list', function () {
    $this->get('/')
        ->assertRedirect(route('books.index'));
});
