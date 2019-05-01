<?php $__env->startSection('content'); ?>
<form action="<?php echo e($form_action); ?>" method=<?php echo e($method ?? 'GET'); ?>>

   <?php echo $__env->yieldContent('form'); ?>

   <button type="submit"><?php echo e($submit_button_label); ?></button>

</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/andrinja/Sites/security-copy/app/views/layouts/form.blade.php ENDPATH**/ ?>