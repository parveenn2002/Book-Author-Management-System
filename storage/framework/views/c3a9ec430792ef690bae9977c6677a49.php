<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>

<h2>Add New Book</h2>

<form method="POST" action="/books">
    <?php echo csrf_field(); ?>

    <div>
        <label>Book Title</label><br>
        <input type="text" name="title" value="<?php echo e(old('title')); ?>">
        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p style="color:red"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <br>

    <div>
        <label>Author</label><br>
        <select name="author_id">
            <option value="">Select Author</option>
            <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($author->id); ?>">
                    <?php echo e($author->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php $__errorArgs = ['author_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p style="color:red"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <br>

    <button type="submit">Save Book</button>
</form>

<br>
<a href="/books">Back to Books</a>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\Books_management\resources\views/books/create.blade.php ENDPATH**/ ?>