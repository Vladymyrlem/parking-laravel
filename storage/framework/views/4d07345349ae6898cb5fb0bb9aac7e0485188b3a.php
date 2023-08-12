<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <button id="btn_add_info" name="btn_add_info" class="btn btn-default pull-right">Add New Info</button>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table" id="info-table">
        <thead>
        <tr>
            <th>Text Content</th>
            <th>Media Content</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody id="infos-list" name="infos-list">
        <?php $__currentLoopData = $information; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr id="inforow-<?php echo e($info->id); ?>">
                <td><?php echo $info->description; ?></td>
                <td>
                    <?php echo $info->media; ?>

                </td>
                <td width="120">
                    <button class="btn btn-warning btn-detail open_info" value="<?php echo e($info->id); ?>">Edit Info</button>
                    <button class="btn btn-danger btn-delete delete-info" value="<?php echo e($info->id); ?>">Delete Info</button>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH /home/vagrant/code/admin-lte/resources/views/partials/information/table.blade.php ENDPATH**/ ?>