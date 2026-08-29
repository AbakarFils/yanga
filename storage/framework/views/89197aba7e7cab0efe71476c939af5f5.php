<?php $__env->startSection('title',  __('cabbooking::static.rides.create')); ?>
<?php $__env->startSection('content'); ?>
<div class="banner-create">
        <div class="row g-xl-4 g-3">
            <?php echo $__env->make('cabbooking::admin.ride.fields', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/gocab/Modules/CabBooking/resources/views/admin/ride/create.blade.php ENDPATH**/ ?>