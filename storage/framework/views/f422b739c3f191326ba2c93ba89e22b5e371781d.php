<div class="table-responsive">
    <table class="table" id="prices-table">
        <thead>
        <tr>
            <th>Count Days</th>
            <th>Standart Price</th>
            <th>Promotional Price</th>
            <th>Start Promotional Date</th>
            <th>End Promotional Date</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prices): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($prices->count_days); ?></td>
                <td><?php echo e($prices->standart_price); ?></td>
                <td><?php echo e($prices->promotional_price); ?></td>
                <td><?php echo e($prices->start_promotional_date); ?></td>
                <td><?php echo e($prices->end_promotional_date); ?></td>
                <td width="120">
                    <?php echo Form::open(['route' => ['prices.destroy', $prices->id], 'method' => 'delete']); ?>

                    <div class='btn-group'>
                        <a href="<?php echo e(route('prices.show', [$prices->id])); ?>"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="<?php echo e(route('prices.edit', [$prices->id])); ?>"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        <?php echo Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]); ?>

                    </div>
                    <?php echo Form::close(); ?>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH /home/vagrant/code/admin-lte/resources/views/pages/prices/table.blade.php ENDPATH**/ ?>