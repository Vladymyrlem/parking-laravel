<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Prices</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">


        <div class="card">

            <?php echo Form::model($prices, ['route' => ['prices.update', $prices->id], 'method' => 'PATCH']); ?>


            <div class="card-body">
                <div class="row">
                    <?php echo $__env->make('pages.prices.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>

            <div class="card-footer">
                <?php echo Form::submit('Save', ['class' => 'btn btn-primary']); ?>

                <a href="<?php echo e(route('prices.index')); ?>" class="btn btn-default">Cancel</a>
            </div>

            <?php echo Form::close(); ?>


        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/admin-lte/resources/views/pages/prices/edit.blade.php ENDPATH**/ ?>