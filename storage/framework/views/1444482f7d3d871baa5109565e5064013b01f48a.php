<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <button id="btn_add_title" name="btn_add" class="btn btn-default pull-right">Add New Section title</button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-offset-2">
        <table class="table table-striped table-hover">
            <thead>
            <tr class="info">
                <th>ID</th>
                <th>Title</th>
                <th>SubTitle</th>
                <th>Slug</th>
            </tr>
            </thead>
            <tbody id="sectiontitle-list" name="sectiontitle-list">
            <?php $__currentLoopData = $section_title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="sectiontitle-<?php echo e($title->id); ?>" class="active">
                    <td> <?php echo e($title->id); ?> </td>
                    <td> <?php echo e($title->title); ?> </td>
                    <td> <?php echo e($title->subtitle); ?> </td>
                    <td> <?php echo e($title->slug); ?> </td>
                    <td width="350px">
                        <button class="btn btn-warning btn-detail open_section_title_modal" value="<?php echo e($title->id); ?>">Edit Title</button>
                        <button class="btn btn-danger btn-delete delete-section-title" value="<?php echo e($title->id); ?>">Delete Title</button>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH /home/vagrant/code/admin-lte/resources/views/partials/sections-title/section-title.blade.php ENDPATH**/ ?>