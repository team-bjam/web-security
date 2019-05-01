<?php $__env->startSection('form'); ?>

    <?php echo $__env->make('partials.inputs.text', [
        'name'  => 'first_name',
        'label' => 'First name'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('partials.inputs.text', [
        'name'  => 'last_name',
        'label' => 'Last name'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
    <?php echo $__env->make('partials.inputs.text', [
        'name'  => 'password_confirmation',
        'label' => 'Confirm password',
        'type'  => 'password'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', [
    'form_action'    => 'register',
    'method'    => 'POST',
    'submit_button_label'   => 'Register'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/andrinja/Sites/security/app/views/register.blade.php ENDPATH**/ ?>