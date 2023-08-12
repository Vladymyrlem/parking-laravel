<section id="reviews" class="container wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
    <div class="row text-center">
        <div class="col-md-12 stars">
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star big"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div id="reviews-carousel" class="slick">
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <div class="review">
                            <?php echo e($review->content); ?>

                        </div>
                        <div class="author">
                            <?php echo e($review->author); ?>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/vagrant/code/admin-lte/resources/views/partials/home-page/reviews.blade.php ENDPATH**/ ?>