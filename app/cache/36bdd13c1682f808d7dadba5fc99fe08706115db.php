<div class="text-input">
    <label for="text_input_<?php echo e($name); ?>"><?php echo e($label); ?></label>
<input id="text_input_<?php echo e($name); ?>" type="<?php echo e($type ?? 'text'); ?>" name="<?php echo e($name); ?>" value="<?php echo e(old($name, $value ?? '')); ?>">
    <?php if(isset(errors()[$name])): ?>
        <ul>
            <?php $__currentLoopData = errors()[$name]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
</div>
<?php /**PATH /Users/andrinja/Sites/security-copy/app/views/partials/inputs/text.blade.php ENDPATH**/ ?>