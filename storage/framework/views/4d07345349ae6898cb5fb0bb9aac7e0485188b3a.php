<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <button id="btn_add_info" name="btn_add_info" class="btn btn-default pull-right mb-3">Dodaj nową informację</button>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-responsive-lg" id="info-table">
        <thead>
        <tr>
            <th>Blok tekstowy</th>
            <th>Media</th>
            <th>Akcja</th>
        </tr>
        </thead>
        <tbody id="infos-list" name="infos-list" class="">
        <?php $__currentLoopData = $information; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr id="inforow-<?php echo e($info->id); ?>">
                <td><?php echo $info->description; ?></td>
                <td>
                    <?php echo $info->media; ?>

                </td>
                <td width="220">
                    <button class="btn btn-warning btn-detail open_info" value="<?php echo e($info->id); ?>">Edytować info</button>
                    <button class="btn btn-danger btn-delete delete-info" value="<?php echo e($info->id); ?>">Usuń info</button>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH /home/vagrant/code/admin-lte/resources/views/partials/information/table.blade.php ENDPATH**/ ?>