<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <div class="content">
        <div class="header-block" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0.75) 100%), url('<?php echo e(asset('images/head-bkg.png')); ?>'), lightgray 50% / cover no-repeat;
">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <form id="myForm">
                            <!-- Form fields -->
                            <input type="text" name="name" placeholder="Name">
                            <input type="email" name="email" placeholder="Email">
                            <!-- Other fields -->
                            <div class="form-group">
                                <label for="start_date">Start Date:</label>
                                <input type="date" class="form-control" name="order_pick_up_date" id="start_date">
                                <input type="time" class="form-control" name="order_pick_up_time" id="start_time">
                            </div>
                            <div class="form-group">
                                <label for="end_date">End Date:</label>
                                <input type="date" class="form-control" name="order_drop_off_date" id="end_date">
                                <input type="time" class="form-control" name="order_drop_off_time" id="end_time">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <input type="text" name="checkout_pick_up_date" value="" id="pick-up-date">
                                        <input type="text" name="checkout_pick_up_time" value="" id="pick-up-time">
                                        <!-- Custom block to display form data -->
                                        <div id="displayData"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div id="headblockCarousel" class="slick">
                            <?php $__currentLoopData = $headBlocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $headBlock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="">
                                    <span class="headblock-title mb-2 fw-bold"><?php echo e($headBlock->title); ?></span>
                                    <span class="headblock-subtitle"><?php echo e($headBlock->subtitle); ?></span>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Prices Section begin-->
        <?php echo $__env->make('partials.home-page.prices', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Prices Section end-->
        <!-- Reviews Section begin-->
        <?php echo $__env->make('partials.home-page.reviews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Reviews Section end-->
        <!-- Information Section begin-->
        <?php echo $__env->make('partials.home-page.information', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Information Section end-->
    </div>
    <!-- /.content -->
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/admin-lte/resources/views/home.blade.php ENDPATH**/ ?>