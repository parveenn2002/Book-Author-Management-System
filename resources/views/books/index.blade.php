<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
    <a href="/books/create">+ Add Book</a>
    <a href="/authors">+ Authors</a>
    <br><br>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

<h2>Books List</h2>

@if($books->count())
    <table>
        <tr>
            <th>#</th>
            <th>Book Title</th>
            <th>Author</th>
            <th>Action</th>
        </tr>

        @foreach ($books as $index => $book)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author->name ?? 'N/A' }}</td>
                <td>
                    <form action="/books/{{ $book->id }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this book?');">
                        @csrf
                        @method('DELETE')

                        <button type="submit" style="color:red;">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@else
    <p>No books found.</p>
@endif

</body>

</html>
