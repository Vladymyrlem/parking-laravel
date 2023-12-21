<section id="prices" class="container" name="#prices">
    <div id="cennik" class="row">
        <div class="col-md-12 text-center">
            <h2 class="title" style="visibility: visible; animation-name: fadeInDown;">Parking RONDO - <span class="subtitle">Obowiązujący cennik parkingu.</span>
            </h2>
        </div>
        <?php
            $now = Carbon\Carbon::now('Europe/Warsaw');
        ?>
        <div class="row text-center prices-grid">
            <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                

                <div class=" text-center box_content <?php if( !empty($price->promotional_price) && $price->end_promotional_date >= $now ): ?>  promo <?php endif; ?>">
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
                                    <span class="start-promotional-value d-none"><?php echo e($price->start_promotional_date); ?></span>
                                    <p class="end-promotional">do: <?php echo e(formatDate($price->end_promotional_date)); ?></p>
                                    <span class="d-none end-promotional-value"><?php echo e($price->end_promotional_date); ?></span>
                                </div>
                            <?php else: ?>
                                <?php echo e($price->standart_price); ?> <small>PLN</small>
                            <?php endif; ?>
                            <span class="standart-price-value d-none"><?php echo e($price->standart_price); ?></span>
                        </h4>
                    </div>
                </div>
                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            <div class=" text-center box_content">
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
</section>
<?php /**PATH /home/vagrant/code/admin-lte/resources/views/partials/home-page/prices.blade.php ENDPATH**/ ?>