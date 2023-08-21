<section id="prices" class="container" name="#prices">
    <div id="cennik" class="row">
        <div class="col-md-12 text-center">
            <h2 class="title" style="visibility: visible; animation-name: fadeInDown;">Parking RONDO - <span class="subtitle">Obowiązujący cennik parkingu.</span>
            </h2>
        </div>
        <?php
            $now = Carbon\Carbon::now('Europe/Warsaw');
            echo $now;
        ?>
        <div class="row text-center">
            <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-6 col-lg-4 col-xl-3 text-center box">

                    <div class="box_content <?php if( !empty($price->promotional_price) && $price->end_promotional_date >= $now ): ?>  promo <?php endif; ?>">
                        
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
                        <div class="bottom-price-box ">
                            <h4>
                                <?php if( $price->promotional_price && $price->end_promotional_date >= $now): ?>
                                    <span class="promotional-price"> <?php echo e($price->promotional_price); ?>&nbsp;<small>PLN</small></span>
                                    <span class="standart-price">
                                    <s><?php echo e($price->standart_price); ?> &nbsp;PLN</s>
                                </span>
                                    <div class="promo-range d-flex flex-column">
                                        <p class="start-promotional">od: <?php echo e(formatDate($price->start_promotional_date)); ?></p>
                                        <p class="start-promotional">do: <?php echo e(formatDate($price->end_promotional_date)); ?></p>
                                    </div>
                                <?php else: ?>
                                    <?php echo e($price->standart_price); ?> <small>PLN</small>
                                <?php endif; ?>
                            </h4>
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