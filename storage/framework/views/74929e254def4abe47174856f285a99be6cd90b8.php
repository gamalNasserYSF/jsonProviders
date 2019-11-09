<?php $__env->startSection('body'); ?>

    <input type="hidden" id="url" value="<?php echo e(url('/')); ?>">

    <!-- movies section -->
    <section class="movies-section">
        <div class="container">
            <div class="row justify-content-center">

                <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- movie -->
                    <div class="col-11 col-md-6 col-xl-4">
                        <div class="movie">
                            <div class="d-flex flex-wrap">
                                <div id="<?php echo e($movie->id); ?>" onclick="getMovieInfo(this.id)"  class="movie-image col-sm-5 p-0"
                                    style="background-image: url('<?php echo e($movie->img); ?>')">
                                    <a href="#"></a>
                                </div>
                                <div class="content col-sm-7">
                                    <h2 class="movie-name" id="<?php echo e($movie->id); ?>" onclick="getMovieInfo(this.id)" ><?php echo e($movie->name); ?></h2>
                                    <span class="date" id="<?php echo e($movie->id); ?>" onclick="getMovieInfo(this.id)" > <?php echo e(date('M d, Y', strtotime($movie->created_at))); ?></span>
                                    <p class="text" id="<?php echo e($movie->id); ?>" onclick="getMovieInfo(this.id)" ><?php echo e($movie->details); ?></p>
                                    <div class="more-info">
                                        <a href="<?php echo e(url('/movie/'.$movie->id)); ?>">More Info</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end movie -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>

        <?php echo $__env->make('movie-info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </section>
    <!-- end movies section -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>