<input type="number" value="<?php echo e(isset($prices) ? $prices->count_days : old('count_days')); ?>" name="count_days" placeholder="Count Days">
<input type="number" value="<?php echo e(isset($prices) ? $prices->standart_price : old('standart_price')); ?>" name="standart_price" placeholder="Standart price">
<input type="number" value="<?php echo e(isset($prices) ? $prices->promotional_price : old('promotional_price')); ?>" name="promotional_price" placeholder="Promotional Price">
<input type="datetime-local" value="<?php echo e(isset($prices) ? $prices->start_promotional_date : old('start_promotional_date')); ?>" name="start_promotional_date" placeholder="Start Promotional Date">
<input type="datetime-local" value="<?php echo e(isset($prices) ? $prices->end_promotional_date : old('end_promotional_date')); ?>" name="end_promotional_date" placeholder="End Promotional Date">
<?php /**PATH /home/vagrant/code/admin-lte/resources/views/pages/prices/fields.blade.php ENDPATH**/ ?>