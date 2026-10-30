@csrf

<div>
    <label for="title" class="block text-sm font-medium">Title</label>
    <input
        id="title"
        name="title"
        type="text"
        value="{{ old('title', $book->title ?? '') }}"
        class="mt-1 w-full rounded-md border border-stone-300 px-3 py-2"
    >
    @error('title')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="author" class="block text-sm font-medium">Author</label>
    <input
        id="author"
        name="author"
        type="text"
        value="{{ old('author', $book->author ?? '') }}"
        class="mt-1 w-full rounded-md border border-stone-300 px-3 py-2"
    >
    @error('author')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="status" class="block text-sm font-medium">Status</label>
    <select id="status" name="status" class="mt-1 w-full rounded-md border border-stone-300 px-3 py-2">
        @foreach (\App\Models\Book::STATUSES as $value => $label)
            <option value="{{ $value }}" @selected(old('status', $book->status ?? 'to-read') === $value)>{{ $label }}</option>
        @endforeach
    </select>
    @error('status')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
