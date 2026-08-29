<?php $__env->startSection('title', __('cabbooking::front.history')); ?>
<?php
        $ridestatuscolorClasses = getRideStatusColorClasses();
        $settings = getCabBookingSettings();
?>
<?php $__env->startPush('css'); ?>
    <!-- aos css -->
    <link rel="preload" as="style" href="<?php echo e(asset('front/css/aos.css')); ?>" onload="this.onload=null;this.rel='stylesheet'">

    <!-- wow animate css link -->
    <link rel="stylesheet" href="<?php echo e(asset('front/css/vendors/wow.css')); ?>" media="print" onload="this.media='all'">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('front/css/vendors/wow-animate.css')); ?>" media="print"
        onload="this.media='all'">
    <link rel="stylesheet" href="https://public.codepenassets.com/css/normalize-5.0.0.min.css">
    
<?php $__env->stopPush(); ?>
<?php $__env->startSection('detailBox'); ?>
<div class="dashboard-details-box table-details-box">
    <div class="dashboard-title">
        <h3><?php echo e(__('cabbooking::front.history')); ?></h3>
        <a href="<?php echo e(route('front.cab.ride.create')); ?>">+ <?php echo e(__('cabbooking::front.create_ride')); ?></a>
    </div>

    <div class="driver-document driver-details">
        <div class="table-responsive custom-scrollbar">
            <table class="table history-table display">
                <?php if($rides->count()): ?>
                    <thead>
                        <tr>
                            <th><?php echo e(__('cabbooking::front.ride_number')); ?></th>
                            <th><?php echo e(__('cabbooking::front.driver')); ?></th>
                            <th><?php echo e(__('cabbooking::front.service')); ?></th>
                            <th><?php echo e(__('cabbooking::front.ride_status')); ?></th>
                            <th><?php echo e(__('cabbooking::front.total_amount')); ?></th>
                            <th><?php echo e(__('cabbooking::front.created_at')); ?></th>
                            <th><?php echo e(__('cabbooking::front.action')); ?></th>
                        </tr>
                    </thead>
                <?php endif; ?>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $rides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ride): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <span class="badge badge-primary bg-light-primary">#<?php echo e($ride->ride_number); ?></span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center profile-box">
                                    <div class="customer-image">
                                        <?php if($ride->driver && $ride->driver->profile_image?->original_url): ?>
                                            <img src="<?php echo e($ride->driver->profile_image->original_url); ?>" alt="<?php echo e($ride->driver->name); ?>" class="img-fluid">
                                        <?php else: ?>
                                            <div class="initial-letter">
                                                <span><?php echo e(strtoupper($ride->driver->name[0] ?? 'N/A')); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="profile-name flex-grow-1">
                                        <h5><?php echo e($ride->driver->name ?? 'Unknown Driver'); ?></h5>
                                        <span>
                                            <?php if(isDemoModeEnabled()): ?>
                                                <?php echo e(__('demo_mode')); ?>

                                            <?php else: ?>
                                                <?php echo e($ride->driver->email ?? 'N/A'); ?>

                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo e($ride->service->name ?? 'N/A'); ?></td>
                            <td>
                                <span class="badge badge-<?php echo e($ridestatuscolorClasses[ucfirst($ride->ride_status?->name)] ?? 'completed'); ?>">
                                    <?php echo e($ride->ride_status->name ?? 'Pending'); ?>

                                </span>
                            </td>
                            <td><?php echo e(getDefaultCurrency()->symbol); ?><?php echo e(number_format($ride->total, 2)); ?></td>
                            <td><?php echo e($ride->created_at->format('Y-m-d h:i:s A')); ?></td>
                            <td>
                                <a href="<?php echo e(route('front.cab.ride.show', $ride->id)); ?>" class="action-icon">
                                    <i class="ri-eye-line"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7">
                                <div class="dashboard-no-data">
                                    <svg>
                                        <use xlink:href="<?php echo e(asset('images/dashboard/front/no-ride.svg#noRide')); ?>"></use>
                                    </svg>
                                    <h6><?php echo e(__('cabbooking::front.no_rides')); ?></h6>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="pagination-main">
            <ul class="pagination-box">
                <?php echo e($rides->links()); ?>

            </ul>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <!-- WOW JS -->
    <script src="<?php echo e(asset('front/js/wow.js')); ?>"></script>
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                new WOW().init();
                $("#changePasswordForm").validate({
                    ignore: [],
                    rules: {
                        "current_password": "required",
                        "new_password": {
                            required: true,
                            minlength: 8
                        },
                        "confirm_password": {
                            required: true,
                            equalTo: "#new_password"
                        },
                    },
                });

                $("#updateProfileForm").validate({
                    ignore: [],
                    rules: {
                        "name": "required",
                        "email": "required",
                        "phone": "required"
                    },
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('cabbooking::front.account.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/gocab/Modules/CabBooking/resources/views/front/account/history.blade.php ENDPATH**/ ?>