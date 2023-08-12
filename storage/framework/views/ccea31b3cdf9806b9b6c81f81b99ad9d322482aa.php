<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?php echo e(__('Dashboard')); ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">
                                <?php echo e(__('You are logged in!')); ?>

                            </p>
                        </div>
                    </div>
                    <!--Header Block-->
                    <div class="header-block">
                        <h2 class="fs-2">Header block</h2>
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-right">
                                    <button id="btn_add" name="btn_add" class="btn btn-default pull-right">Add New Head Row</button>
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
                                        <th>Subtitle</th>
                                    </tr>
                                    </thead>
                                    <tbody id="headblock-list" name="headblock-list">
                                    <?php $__currentLoopData = $headBlocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $headBlock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="headblock-<?php echo e($headBlock->id); ?>" class="active">
                                            <td> <?php echo e($headBlock->id); ?> </td>
                                            <td> <?php echo e($headBlock->title); ?> </td>
                                            <td><?php echo e($headBlock->subtitle); ?></td>
                                            <td width="35%">
                                                <button class="btn btn-warning btn-detail open_header_modal" value="<?php echo e($headBlock->id); ?>">Edit</button>
                                                <button class="btn btn-danger btn-delete delete-product" value="<?php echo e($headBlock->id); ?>">Delete</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Prices Block -->
                    <div class="prices-block">
                        <h2 class="fs-2">Prices block</h2>

                        <?php echo $__env->make('partials.prices-block.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('partials.prices-block.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="modal" id="deleteConfirmationModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirm Deletion</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this product?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Information Block-->
                    <div class="info-block">
                        <h2 class="fs-2">Information block</h2>
                        <?php echo $__env->make('partials.information.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('partials.information.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- Reviews Block-->
                    <div class="reviews-section">
                        <h2 class="fs-2">Reviews</h2>
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-right">
                                    <button id="btn_add_review" name="btn_add_review" class="btn btn-default pull-right">Add New Review</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-offset-2">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr class="reviews">
                                        <th>ID</th>
                                        <th>Content</th>
                                        <th>Author</th>
                                    </tr>
                                    </thead>
                                    <tbody id="reviews-list" name="reviews-list">
                                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="review-<?php echo e($review->id); ?>" class="active">
                                            <td><?php echo e($review->id); ?></td>
                                            <td><?php echo e($review->content); ?></td>
                                            <td><?php echo e($review->author); ?></td>
                                            <td width="35%">
                                                <button class="btn btn-warning btn-detail open_review_modal" value="<?php echo e($review->id); ?>">Edit</button>
                                                <button class="btn btn-danger btn-delete delete-review" value="<?php echo e($review->id); ?>">Delete</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Contacts Block-->
                    <div class="contacts-block">
                        <h2 class="fs-2">Contacts block</h2>
                        <?php echo $__env->make('partials.contacts.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!--Header Block-->
                    <div class="section-title-block">
                        <h2 class="fs-2">Sections title block</h2>
                        <?php echo $__env->make('partials.sections-title.section-title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- Services Block-->
                    <div class="services-block">
                        <h2 class="fs-2">Services block</h2>
                        <?php echo $__env->make('partials.services.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('partials.services.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
            <div id="tdd"></div>
            <div id="doff"></div>
            <p>
                <button type="button" id="add">dodaj nowy</button>
            </p>


            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/admin-lte/resources/views/admin.blade.php ENDPATH**/ ?>