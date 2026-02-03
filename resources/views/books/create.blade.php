<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>

<h2>Add New Book</h2>

<form method="POST" action="/books">
    @csrf

    <div>
        <label>Book Title</label><br>
        <input type="text" name="title" value="{{ old('title') }}">
        @error('title')
            <p style="color:red">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <label>Author</label><br>
        <select name="author_id">
            <option value="">Select Author</option>
            @foreach ($authors as $author)
                <option value="{{ $author->id }}">
                    {{ $author->name }}
                </option>
            @endforeach
        </select>
        @error('author_id')
            <p style="color:red">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <button type="submit">Save Book</button>
</form>

<br>
<a href="/books">Back to Books</a>

</body>
</html>
