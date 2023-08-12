

<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <div class="content">
        <!-- Header Block Section begin -->
        <?php echo $__env->make('partials.home-page.header-block', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Header Block Section end -->
        <!-- About Us Section begin -->
        <?php echo $__env->make('partials.home-page.about-us', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- About Us Section end -->
        <!-- Services Section begin -->
        <?php echo $__env->make('partials.home-page.services', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Services Section end -->
        <!-- Newsletter Section begin-->
        <?php echo $__env->make('partials.home-page.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Newsletter Section end-->
        <!-- Prices Section begin-->
        <?php echo $__env->make('partials.home-page.prices', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Prices Section end-->
        <!-- Information Section begin-->
        <?php echo $__env->make('partials.home-page.information', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Information Section end-->
        <!-- Partners Section begin-->
        <?php echo $__env->make('partials.home-page.partners', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Partners Section end-->
        <!-- Gallery Section begin-->
        <?php echo $__env->make('partials.home-page.gallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Gallery Section end-->
        <!-- Reviews Section begin-->
        <?php echo $__env->make('partials.home-page.reviews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Reviews Section end-->
        <!-- Contacts Section begin -->
        <?php echo $__env->make('partials.home-page.contacts-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Contacts Section end -->
        <!-- Locations Section begin-->
        <?php echo $__env->make('partials.home-page.locations', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Locations Section end-->
        <!-- Contact Us Section begin-->
        <?php echo $__env->make('partials.home-page.contacts-us', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Contact Us Section end-->
        <!-- Privacy policy Section begin-->
        <?php echo $__env->make('partials.home-page.terms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Privacy Policy Section end-->
    </div>
    <!-- /.content -->
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/admin-lte/resources/views/home.blade.php ENDPATH**/ ?>