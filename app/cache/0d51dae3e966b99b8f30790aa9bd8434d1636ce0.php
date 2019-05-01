<?php $__env->startSection('content'); ?>
    <h1>Thank you for joining us, <?php echo e(ucfirst($name)); ?> !</h1>
    <p>Please click on the link below to activate your account:</p>
    <a href="<?php echo e(activation_url($token, $email)); ?>">Confirm</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.email', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/andrinja/Sites/security/app/views/emails/confirmation.blade.php ENDPATH**/ ?>