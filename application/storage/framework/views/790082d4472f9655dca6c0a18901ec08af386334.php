<?php if(auth()->user()->is_team): ?>
<?php echo $__env->make('nav.leftmenu-team', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if(auth()->user()->is_client): ?>
<?php echo $__env->make('nav.leftmenu-client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /www/wwwroot/fernando.sngcr.com/application/resources/views/nav/leftmenu.blade.php ENDPATH**/ ?>