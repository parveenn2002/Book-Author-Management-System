<!DOCTYPE html>
<html>
<head>
    <title>Add Author</title>
</head>
<body>

<h2>Add New Author</h2>

<form method="POST" action="/authors">
    @csrf

    <div>
        <label>Name</label><br>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
            <p style="color:red">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')
            <p style="color:red">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <button type="submit">Save Author</button>
</form>

<br>
<a href="/authors">Back to Authors</a>

</body>
</html>
