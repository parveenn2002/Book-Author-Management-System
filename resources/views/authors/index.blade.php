<!DOCTYPE html>
<html>
<head>
    <title>Authors & Books</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        .author {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
        }
        h3 {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

@if(session('success'))
    <div style="color: green; margin-bottom: 15px;">
        {{ session('success') }}
    </div>
@endif

<a href="/authors/create"
   style="display:inline-block; margin-bottom:15px;">
    + Add Author
</a>
<a href="/books/create"
   style="display:inline-block; margin-bottom:15px; margin-right:10px;">
    + Add Book
</a>


<h2>Authors and Their Books</h2>

@forelse ($authors as $author)
    <div style="border:1px solid #ddd; padding:15px; margin-bottom:15px;">

        <h3>{{ $author->name }}</h3>
        <p>Email: {{ $author->email }}</p>

        <strong>Books:</strong>
        <ul>
            @forelse ($author->books as $book)
                <li>{{ $book->title }}</li>
            @empty
                <li>No books available</li>
            @endforelse
        </ul>

        <form action="/authors/{{ $author->id }}" method="POST"
              onsubmit="return confirm('Are you sure you want to delete this author?');">
            @csrf
            @method('DELETE')

            <button type="submit" style="color:red;">Delete Author</button>
        </form>

    </div>
@empty
    <p>No authors found.</p>
@endforelse

</body>


</html>
