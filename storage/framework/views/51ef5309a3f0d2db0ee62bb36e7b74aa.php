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

<?php if(session('success')): ?>
    <div style="color: green; margin-bottom: 15px;">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<a href="/authors/create"
   style="display:inline-block; margin-bottom:15px;">
    + Add Author
</a>
<a href="/books/create"
   style="display:inline-block; margin-bottom:15px; margin-right:10px;">
    + Add Book
</a>


<h2>Authors and Their Books</h2>

<?php $__empty_1 = true; $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div style="border:1px solid #ddd; padding:15px; margin-bottom:15px;">

        <h3><?php echo e($author->name); ?></h3>
        <p>Email: <?php echo e($author->email); ?></p>

        <strong>Books:</strong>
        <ul>
            <?php $__empty_2 = true; $__currentLoopData = $author->books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                <li><?php echo e($book->title); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                <li>No books available</li>
            <?php endif; ?>
        </ul>

        <form action="/authors/<?php echo e($author->id); ?>" method="POST"
              onsubmit="return confirm('Are you sure you want to delete this author?');">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>

            <button type="submit" style="color:red;">Delete Author</button>
        </form>

    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <p>No authors found.</p>
<?php endif; ?>

</body>


</html>
<?php /**PATH C:\xampp\htdocs\Books_management\resources\views/authors/index.blade.php ENDPATH**/ ?>