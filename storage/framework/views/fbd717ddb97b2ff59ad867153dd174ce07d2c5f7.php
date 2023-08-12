<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">

                    <input type="text" id="dt" placeholder="Click to view the calendar">
                    <div id="dd"></div>
                </div>
                <div class="col-6">
                    <ol class="days">
                        <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                // Assuming $date is in the format 'Y-m-d' (e.g., '2023-07-11')
                                $reserved = $reservedDates->contains($date);
                                $class = $reserved ? 'reserved' : '';
                            ?>
                            <li style="width:40px;height:40px;line-height:40px" class="<?php echo e($class); ?>" data-calendar-day="<?php echo e($date); ?>"><?php echo e(date('j', strtotime($date))); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ol>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/admin-lte/resources/views/pages/activity.blade.php ENDPATH**/ ?>