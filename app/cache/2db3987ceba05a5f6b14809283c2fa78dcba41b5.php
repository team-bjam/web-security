<?php $__env->startSection('form'); ?>

    <?php echo $__env->make('partials.inputs.text', [
        'name'  => 'email',
        'label' => 'Email',
        'type'  => 'email',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('partials.inputs.text', [
        'name'  => 'password',
        'label' => 'Password',
        'type'  => 'password'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', [
    'form_action'    => 'login',
    'method'    => 'POST',
    'submit_button_label'   => 'Log in'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/andrinja/Sites/security-copy/app/views/login.blade.php ENDPATH**/ ?>