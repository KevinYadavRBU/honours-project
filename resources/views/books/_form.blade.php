@csrf

<div class="form-field">
    <label for="title">Title</label>
    <input
        id="title"
        name="title"
        type="text"
        value="{{ old('title', $book->title ?? '') }}"
    >
    @error('title')
        <p class="error-message">{{ $message }}</p>
    @enderror
</div>

<div class="form-field">
    <label for="author">Author</label>
    <input
        id="author"
        name="author"
        type="text"
        value="{{ old('author', $book->author ?? '') }}"
    >
    @error('author')
        <p class="error-message">{{ $message }}</p>
    @enderror
</div>

<div class="form-field">
    <label for="status">Status</label>
    <select id="status" name="status">
        @foreach (\App\Models\Book::STATUSES as $value => $label)
            <option value="{{ $value }}" @selected(old('status', $book->status ?? 'to-read') === $value)>{{ $label }}</option>
        @endforeach
    </select>
    @error('status')
        <p class="error-message">{{ $message }}</p>
    @enderror
</div>
