<section id="prices" name="#cennik" class="container">
    <div id="cennik" class="row">
        <div class="col-md-12 text-center">
            <h2 class="title wow fadeInDown animated" data-wow-offset="200" style="visibility: visible; animation-name: fadeInDown;">Parking RONDO - <span class="subtitle">Obowiązujący cennik parkingu.</span>
            </h2>
        </div>

        <div class="row text-center">
            <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 text-center box">
                    <div class="box_content"><h1><?php echo e($price->count_days); ?></h1><span class="subtitle">
                                    <?php if(1 === $price->count_days): ?>
                                dzień
                            <?php else: ?>
                                dni
                            <?php endif; ?>
                                </span>
                        <h2><?php echo e($price->standart_price); ?> <small>PLN</small></h2></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3 text-center box">
                <div class="box_content"><h1>&gt; 15 dni</h1><span class="subtitle"><small class="blue">każdy kolejny dzień</small></span>
                    <h2>10.00 <small>PLN</small></h2></div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/vagrant/code/admin-lte/resources/views/partials/home-page/prices.blade.php ENDPATH**/ ?>