<!DOCTYPE html>
<html>
<head>
    <title>Add Author</title>
</head>
<body>

<h2>Add New Author</h2>

<form method="POST" action="/authors">
    <?php echo csrf_field(); ?>

    <div>
        <label>Name</label><br>
        <input type="text" name="name" value="<?php echo e(old('name')); ?>">
        <?php $__errorArgs = ['name'];
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
        <label>Email</label><br>
        <input type="email" name="email" value="<?php echo e(old('email')); ?>">
        <?php $__errorArgs = ['email'];
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

    <button type="submit">Save Author</button>
</form>

<br>
<a href="/authors">Back to Authors</a>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\Books_management\resources\views/authors/create.blade.php ENDPATH**/ ?>