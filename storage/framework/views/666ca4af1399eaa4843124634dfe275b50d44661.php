<?php $__env->startSection('body'); ?>

    <div class="card">
        <img src="<?php echo e($movie->img); ?>" alt="John" style="margin: auto;text-align: center;width:50%">
        <h1> <?php echo e($movie->name); ?></h1>
        <p class="title"> <?php echo e(date('M d, Y', strtotime($movie->created_at))); ?> </p>
        <p><?php echo e($movie->details); ?></p>
    </div>

    

    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>