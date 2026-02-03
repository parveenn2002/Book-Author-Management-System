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

<?php if($books->count()): ?>
    <table>
        <tr>
            <th>#</th>
            <th>Book Title</th>
            <th>Author</th>
            <th>Action</th>
        </tr>

        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($index + 1); ?></td>
                <td><?php echo e($book->title); ?></td>
                <td><?php echo e($book->author->name ?? 'N/A'); ?></td>
                <td>
                    <form action="/books/<?php echo e($book->id); ?>" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this book?');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="submit" style="color:red;">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
<?php else: ?>
    <p>No books found.</p>
<?php endif; ?>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\Books_management\resources\views/books/index.blade.php ENDPATH**/ ?>