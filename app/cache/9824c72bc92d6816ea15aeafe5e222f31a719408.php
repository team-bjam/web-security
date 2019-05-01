<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php if(status()): ?>
    <div><?php echo e(status()); ?></div>
    <?php endif; ?>
    <?php echo $__env->yieldContent('content'); ?>
</body>
</html><?php /**PATH /Users/andrinja/Sites/security/app/views/layouts/app.blade.php ENDPATH**/ ?>