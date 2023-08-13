<section class="information" id="information">
    <div class="container">
        <?php $__currentLoopData = $information; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <div class="col-xl-6 col-12"><?php echo $info->description; ?></div>
                <div class="col-xl-6 col-12 media-column">
                    <?php if(!empty($info->media)): ?>
                        <?php echo $info->media; ?>

                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php /**PATH /home/vagrant/code/admin-lte/resources/views/partials/home-page/information.blade.php ENDPATH**/ ?>