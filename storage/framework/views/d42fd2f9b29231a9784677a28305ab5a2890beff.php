<section id="prices" class="container" name="#prices">
    <div id="cennik" class="row">
        <div class="col-md-12 text-center">
            <h2 class="title" style="visibility: visible; animation-name: fadeInDown;">Parking RONDO - <span class="subtitle">Obowiązujący cennik parkingu.</span>
            </h2>
        </div>

        <div class="row text-center">
            <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-6 col-lg-4 col-xl-3 text-center box">
                    <div class="box_content">
                        <div class="top-price-box">
                            <h2><?php echo e($price->count_days); ?></h2>
                            <h3 class="subtitle">
                                <?php if(1 === $price->count_days): ?>
                                    dzień
                                <?php else: ?>
                                    dni
                                <?php endif; ?>
                            </h3>
                        </div>
                        <div class="bottom-price-box">
                            <h4><?php echo e($price->standart_price); ?> <small>PLN</small></h4>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 m-md-auto text-center box">
                <div class="box_content">
                    <div class="top-price-box">
                        <h2>&gt; 15 dni</h2>
                        <h3 class="subtitle">każdy kolejny dzień</h3>
                    </div>
                    <div class="bottom-price-box">
                        <h4>10.00 <small>PLN</small></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/vagrant/code/admin-lte/resources/views/partials/home-page/prices.blade.php ENDPATH**/ ?>