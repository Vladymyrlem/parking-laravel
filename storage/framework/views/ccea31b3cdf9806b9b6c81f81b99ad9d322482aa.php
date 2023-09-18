<?php $__env->startSection('content'); ?>
    <style>


        .content-header {
            margin-top: 0;
        }

        .pagination {
            display: flex !important
        }
    </style>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="m-0 text-center"><?php echo e(__('Tablica zamówień')); ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div id="orders-table" name="#orders-table">
        <div class="toolbar">
            <button id="b1" class="btn btn-secondary mb-1">przyjazd dzisiaj</button>
            <button id="b2" class="btn btn-secondary mb-1">wyjazd dzisiaj</button>
            <button id="b3" class="btn btn-secondary mb-1">z dzisiaj</button>
            <button id="b4" class="btn btn-secondary mb-1">pokaż starsze</button>
            <button id="resetFilters" class="btn btn-secondary">wyczyść filtr</button>
        </div>
        <!-- /.content-header -->
        <table id="parkingTable" data-toggle="table"
               class="table-responsive-lg"
               data-search="false"
               data-show-refresh="false"
               data-show-toggle="true"
               data-show-fullscreen="true"
               data-show-columns="false"
               data-show-columns-toggle-all="false"
               data-detail-view="false"
               data-show-export="false"
               data-click-to-select="true"
               data-detail-formatter="detailFormatter"
               data-minimum-count-columns="2"
               data-show-pagination-switch="true"
               data-pagination="true"
               data-id-field="id"
               data-page-size="25"
               data-toolbar=".toolbar"
               data-page-list="[10, 25, 50, 100, all]"
               data-show-footer="true">
            <thead>
            <tr>

                <th data-field="id" data-sortable="true">numer</th>
                <th data-field="created_at" data-sortable="true">z dnia</th>
                <th data-field="createdh" data-sortable="true" class="d-none">z dnia h</th>
                <th data-field="arrival" data-sortable="true">przyjazd</th>
                <th data-field="arrivalh" data-sortable="true" data-sorter="dateSort" class="d-none">przyjazdh</th>
                <th data-field="departure" data-sortable="true">wyjazd</th>
                <th data-field="departureh" data-sortable="true" class="d-none" data-sorter="dateSort">wyjazdh</th>
                <th data-field="count_days" data-sortable="true">ilość dni</th>
                <th data-field="price" data-sortable="true">cena</th>
                <th data-field="number_peoples" data-sortable="true">osob</th>
                <th data-field="contacts" data-sortable="true">kontakt</th>
                <th data-field="cars" data-sortable="true">pojazd</th>
                <!-- Add more data-field attributes as needed -->
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $parkings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="id"><?php echo e($parking->id); ?></td>
                    <td class="created-date"><?php echo e($parking->created_at); ?>

                        <button class="btn btn-danger delete-btn" data-order-id="<?php echo e($parking->id); ?>">Usuń</button>
                    </td>
                    <td class="created-date-without-time d-none"><?php echo e(getConvertedDate($parking->created_at)); ?>

                    </td>
                    <td class="arrival-date"><?php echo e($parking->arrival); ?></td>
                    <td class="arrival-date-without-time d-none">
                        <?php echo e(getConvertedDate($parking->arrival)); ?>

                    </td>
                    <td class="departure-date"><?php echo e($parking->departure); ?></td>
                    <td class="departure-date-without-time d-none"><?php echo e(getConvertedDate($parking->departure)); ?></td>
                    <td><?php echo e($parking->number_days); ?></td>
                    <td><?php echo e($parking->price); ?></td>
                    <td><?php echo e($parking->number_peoples); ?></td>
                    <td>
                        <div class="d-flex flex-column">
                            <div class="d-flex">
                                <?php echo e($parking->client_name); ?>&nbsp;
                                <?php echo e($parking->client_surname); ?>

                            </div>
                            <div class="d-flex">telefon:&nbsp;<?php echo e($parking->phone_number); ?></div>
                            email:
                            <a href="mailto:<?php echo e($parking->email); ?>"><?php echo e($parking->email); ?></a>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <?php if($parking->type_car == 1): ?>
                                Samochód osobowy
                            <?php else: ?>
                                SUV / VAN
                            <?php endif; ?>
                            <br>
                            <?php echo e($parking->car_number); ?>

                            <div class="d-flex">
                                <?php echo e($parking->car_mark); ?>&nbsp;
                                <?php echo e($parking->car_model); ?>

                            </div>
                        </div>
                    </td>
                    <!-- Add more table data cells as needed -->
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div>
    <!-- Main content -->
    <div class="content calendar-content pl-sm-3 pr-sm-3">
        <section class="calendar" id="calendar" name="#calendar">
            <h2 class="calendar__title">Dni w których wyłączona jest możliwość złożenia zamówienia</h2>
            <div class="calendar__container">
                <div class="calendar__visual_wrapper mb-5 mb-md-0">
                    <div class="calendar__main_calendar"></div>
                </div>
                <div class="calendar__date_list_wrapper">

                    <div class="calendar__add_date_preloader hidden">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>

                    <ul class="calendar__date_list"></ul>

                    <div class="calendar__add_date_w">

                        <ul class="calendar__add_date_list"></ul>

                        <div class="calendar__add_date_btn_w">
                            <button type="button" class="calendar__add_date_btn js_select_repeater">dodaj nowy</button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="calendar__btn_submit_w">
                <button type="submit" class="calendar__btn_submit js_btn_submit">zapisz</button>
            </div>
        </section>

        <div class="row">
            <div class="col-lg-12 d-flex flex-column">
                <img src="<?php echo e(asset('images/parking-logo.png')); ?>"
                     alt="Parking Rondo Logo"
                     class="brand-image mt-3 mb-3 ml-auto mr-auto"
                     style="opacity: 1">
                <!--Header Block-->
                <div class="header-block mt-0" id="header-block" name="#header-block">
                    <h2 class="fs-2 text-center">Slider</h2>
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-right">
                                <button id="btn_add" name="btn_add" class="btn btn-default pull-right mb-3">Dodaj nowy slide</button>
                            </div>
                            <button id="toggleRowsButton" class="btn btn-primary">Pokaż wszystkie wierzy</button>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-offset-2">
                            <table class="table table-striped table-hover table-responsive-lg" id="headerTable">
                                <thead>
                                <tr class="info">
                                    <th>ID</th>
                                    <th id="slide-title">Nagłówek</th>
                                    <th id="slide-subtitle">Podtytuł</th>
                                </tr>
                                </thead>
                                <tbody id="headblock-list" name="headblock-list">
                                <?php $__currentLoopData = $headBlocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $headBlock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="headblock-<?php echo e($headBlock->id); ?>" class="active">
                                        <td> <?php echo e($headBlock->id); ?> </td>
                                        <td> <?php echo e($headBlock->title); ?> </td>
                                        <td><?php echo $headBlock->subtitle; ?></td>
                                        <td width="150">
                                            <button class="btn btn-warning btn-detail open_header_modal" value="<?php echo e($headBlock->id); ?>">Edytuj</button>
                                            <button class="btn btn-danger btn-delete delete-product" value="<?php echo e($headBlock->id); ?>">Usuń</button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <img src="<?php echo e(asset('images/parking-logo.png')); ?>"
                     alt="Parking Rondo Logo"
                     class="brand-image mt-3 mb-3 ml-auto mr-auto"
                     style="opacity: 1">
                <div class="about-us-block" id="about-us" name="#about-us">
                    <?php echo $__env->make('partials.about-us-block.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <img src="<?php echo e(asset('images/parking-logo.png')); ?>"
                     alt="Parking Rondo Logo"
                     class="brand-image mt-3 mb-3 ml-auto mr-auto"
                     style="opacity: 1">
                <!-- Prices Block -->
                <div class="prices-block" id="prices" name="#prices">
                    <h2 class="fs-2 text-center">Cennik</h2>

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
                <img src="<?php echo e(asset('images/parking-logo.png')); ?>"
                     alt="Parking Rondo Logo"
                     class="brand-image mt-3 mb-3 ml-auto mr-auto"
                     style="opacity: 1">
                <!-- Information Block-->
                <div class="info-block" id="info" name="#info">
                    <?php echo csrf_field(); ?>
                    <h2 class="fs-2 text-center">Informacja</h2>
                    <?php echo $__env->make('partials.information.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('partials.information.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <img src="<?php echo e(asset('images/parking-logo.png')); ?>"
                     alt="Parking Rondo Logo"
                     class="brand-image mt-3 mb-3 ml-auto mr-auto"
                     style="opacity: 1">
                <!-- Reviews Block-->
                <div class="reviews-section" id="reviews" name="#reviews">
                    <h2 class="fs-2 text-center">Opinia</h2>
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-right">
                                <button id="btn_add_review" name="btn_add_review" class="btn btn-default pull-right mb-3">Dodaj nowe opinia</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-offset-2">
                            <table class="table table-striped table-hover table-responsive">
                                <thead>
                                <tr class="reviews">
                                    <th>ID</th>
                                    <th id="reviews-content">Zawartość</th>
                                    <th id="reviews-author">Autor</th>
                                </tr>
                                </thead>
                                <tbody id="reviews-list" name="reviews-list">
                                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="review-<?php echo e($review->id); ?>" class="active">
                                        <td><?php echo e($review->id); ?></td>
                                        <td><?php echo e($review->content); ?></td>
                                        <td><?php echo e($review->author); ?></td>
                                        <td width="150">
                                            <button class="btn btn-warning btn-detail open_review_modal" value="<?php echo e($review->id); ?>">Edycja</button>
                                            <button class="btn btn-danger btn-delete delete-review" value="<?php echo e($review->id); ?>">Usuń</button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <img src="<?php echo e(asset('images/parking-logo.png')); ?>"
                     alt="Parking Rondo Logo"
                     class="brand-image mt-3 mb-3 ml-auto mr-auto"
                     style="opacity: 1">
                <!-- Contacts Block-->
                <div class="contacts-block" id="contacts" name="#contacts">
                    <h2 class="fs-2 text-center">Kontakt</h2>
                    <?php echo $__env->make('partials.contacts.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <img src="<?php echo e(asset('images/parking-logo.png')); ?>"
                     alt="Parking Rondo Logo"
                     class="brand-image mt-3 mb-3 ml-auto mr-auto"
                     style="opacity: 1">
                <!--Header Block-->
                <div class="section-title-block" id="titles" name="#titles">
                    <h2 class="fs-2 text-center">Sekcja nagłówków</h2>
                    <?php echo $__env->make('partials.sections-title.section-title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <img src="<?php echo e(asset('images/parking-logo.png')); ?>"
                     alt="Parking Rondo Logo"
                     class="brand-image mt-3 mb-3 ml-auto mr-auto"
                     style="opacity: 1">
                <!-- Services Block-->
                <div class="services-block" id="services" name="#services">
                    <h2 class="fs-2 text-center">Zalety</h2>
                    <?php echo $__env->make('partials.services.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                

                <div class="section-text-content" id="text-content" name="#text-content">
                    <h2 class="fs-2 text-center">Bloki tekstowe</h2>
                    <?php echo $__env->make('partials.text-content.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('partials.text-content.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>


        <!-- /.row -->
    </div>
    <!-- /.content -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/admin-lte/resources/views/admin.blade.php ENDPATH**/ ?>