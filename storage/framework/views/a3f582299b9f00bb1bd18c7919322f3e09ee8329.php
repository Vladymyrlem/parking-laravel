<!-- Count Days Field -->
<div class="col-sm-12">
    <?php echo Form::label('count_days', 'Count Days:'); ?>

    <p><?php echo e($prices->count_days); ?></p>
</div>

<!-- Standart Price Field -->
<div class="col-sm-12">
    <?php echo Form::label('standart_price', 'Standart Price:'); ?>

    <p><?php echo e($prices->standart_price); ?></p>
</div>

<!-- Promotional Price Field -->
<div class="col-sm-12">
    <?php echo Form::label('promotional_price', 'Promotional Price:'); ?>

    <p><?php echo e($prices->promotional_price); ?></p>
</div>

<!-- Start Promotional Date Field -->
<div class="col-sm-12">
    <?php echo Form::label('start_promotional_date', 'Start Promotional Date:'); ?>

    <p><?php echo e($prices->start_promotional_date); ?></p>
</div>

<!-- End Promotional Date Field -->
<div class="col-sm-12">
    <?php echo Form::label('end_promotional_date', 'End Promotional Date:'); ?>

    <p><?php echo e($prices->end_promotional_date); ?></p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    <?php echo Form::label('created_at', 'Created At:'); ?>

    <p><?php echo e($prices->created_at); ?></p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    <?php echo Form::label('updated_at', 'Updated At:'); ?>

    <p><?php echo e($prices->updated_at); ?></p>
</div>

<?php /**PATH /home/vagrant/code/admin-lte/resources/views/pages/prices/show_fields.blade.php ENDPATH**/ ?>