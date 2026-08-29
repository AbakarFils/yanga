<?php use \Modules\CabBooking\Models\WithdrawRequest; ?>
<?php use \Modules\CabBooking\Models\DriverWallet; ?>
<?php use \Modules\CabBooking\Enums\RideStatusEnum; ?>
<?php use \Modules\CabBooking\Models\Driver; ?>
<?php use \App\Enums\RoleEnum; ?>
<?php use \Modules\CabBooking\Enums\RoleEnum as CabBookingRoleEnum; ?>
<?php
    $roleName = getCurrentRoleName();
    if (getCurrentRoleName() == CabBookingRoleEnum::DRIVER) {
        $driver = Driver::where('id', getCurrentUserId())->first();
    }
    $dateRange = getStartAndEndDate(request('sort'), request('start'), request('end'));
    $start_date = $dateRange['start'] ?? null;
    $end_date = $dateRange['end'] ?? null;
    $services = getAllServices();
?>

<div class="col-12">
    <div class="row">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ride.index')): ?>
        <div class="col-xxl-4">
            <div class="row">
                <div class="col-xxl-12 col-xl-6">
                    <div class="card welcome-card">
                        <div class="card-body welcome-card-body">
                            <div class="wlc-card-wrap">
                                <div class="text-aligns">
                                    <h3>
                                        <?php echo e(auth()?->user()?->name ?? getCurrentRoleName()); ?>

                                        <img src="<?php echo e(asset('images/dashboard/hand.gif')); ?>" alt="">
                                    </h3>
                                    <p>
                                        <?php echo e(__('cabbooking::static.front_info')); ?>

                                    </p>
                                </div>
                                <button class="btn btn-light">
                                    <a href="<?php echo e(route('admin.ride-request.create')); ?>">
                                        <?php echo e(__('cabbooking::front.book_now')); ?>

                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12 col-xl-6">
                    <div class="row">
                        <div class="col-sm-6">
                           <a href="<?php echo e(route('admin.ride.status.filter', ['status' => RideStatusEnum::REQUESTED])); ?>">
                                <div class="card widgets">
                                    <div class="card-body p-0">
                                        <div class="widget-wrapper">
                                            <div class="svg-wrapper">
                                                <svg>
                                                    <use
                                                        xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#request-ride')); ?>">
                                                    </use>
                                                </svg>
                                            </div>
                                            <div class="content-wrapper">
                                                <h3><?php echo e(getTotalRidesByStatus(RideStatusEnum::REQUESTED, $start_date, $end_date) ?? 0); ?>

                                                </h3>
                                                <p><?php echo e(__('cabbooking::static.rides.requested')); ?></p>
                                            </div>
                                            <svg class="redirecting">
                                                <use
                                                    xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#arrow-right')); ?>">
                                                </use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6">

                            <a href="<?php echo e(route('admin.ride.status.filter', ['status' => RideStatusEnum::ACCEPTED])); ?>">
                                <div class="card widgets">
                                    <div class="card-body p-0">
                                        <div class="widget-wrapper">
                                            <div class="svg-wrapper">
                                                <svg>
                                                    <use
                                                        xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#accept-ride')); ?>">
                                                    </use>
                                                </svg>
                                            </div>
                                            <div class="content-wrapper">
                                                <h3><?php echo e(getTotalRidesByStatus(RideStatusEnum::ACCEPTED, $start_date, $end_date) ?? 0); ?>

                                                </h3>
                                                <p> <?php echo e(__('cabbooking::static.rides.accepted')); ?></p>
                                            </div>
                                            <svg class="redirecting">
                                                <use
                                                    xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#arrow-right')); ?>">
                                                </use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?php echo e(route('admin.ride.status.filter', ['status' => RideStatusEnum::STARTED])); ?>">
                                <div class="card widgets">
                                    <div class="card-body p-0">
                                        <div class="widget-wrapper">
                                            <div class="svg-wrapper">
                                                <svg>
                                                    <use
                                                        xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#started-ride')); ?>">
                                                    </use>
                                                </svg>
                                            </div>
                                            <div class="content-wrapper">
                                                <h3><?php echo e(getTotalRidesByStatus(RideStatusEnum::STARTED, $start_date, $end_date) ?? 0); ?>

                                                </h3>
                                                <p><?php echo e(__('cabbooking::static.rides.started')); ?></p>
                                            </div>
                                            <svg class="redirecting">
                                                <use
                                                    xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#arrow-right')); ?>">
                                                </use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?php echo e(route('admin.ride.status.filter', ['status' => RideStatusEnum::SCHEDULED])); ?>">
                                <div class="card widgets">
                                    <div class="card-body p-0">
                                        <div class="widget-wrapper">
                                            <div class="svg-wrapper">
                                                <svg>
                                                    <use
                                                        xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#scheduled-ride')); ?>">
                                                    </use>
                                                </svg>
                                            </div>
                                            <div class="content-wrapper">
                                                <h3><?php echo e(getTotalRidesByStatus(RideStatusEnum::SCHEDULED, $start_date, $end_date) ?? 0); ?>

                                                </h3>
                                                <p><?php echo e(__('cabbooking::static.rides.scheduled')); ?></p>
                                            </div>
                                            <svg class="redirecting">
                                                <use
                                                    xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#arrow-right')); ?>">
                                                </use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?php echo e(route('admin.ride.status.filter', ['status' => RideStatusEnum::CANCELLED])); ?>">
                                <div class="card widgets">
                                    <div class="card-body p-0">
                                        <div class="widget-wrapper">
                                            <div class="svg-wrapper">
                                                <svg>
                                                    <use
                                                        xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#cancelled-ride')); ?>">
                                                    </use>
                                                </svg>
                                            </div>
                                            <div class="content-wrapper">
                                                <h3><?php echo e(getTotalRidesByStatus(RideStatusEnum::CANCELLED, $start_date, $end_date) ?? 0); ?>

                                                </h3>
                                                <p><?php echo e(__('cabbooking::static.rides.cancelled')); ?></p>
                                            </div>
                                            <svg class="redirecting">
                                                <use
                                                    xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#arrow-right')); ?>">
                                                </use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?php echo e(route('admin.ride.status.filter', ['status' => RideStatusEnum::COMPLETED])); ?>">
                                <div class="card widgets">
                                    <div class="card-body p-0">
                                        <div class="widget-wrapper">
                                            <div class="svg-wrapper">
                                                <svg>
                                                    <use
                                                        xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#completed-ride')); ?>">
                                                    </use>
                                                </svg>
                                            </div>
                                            <div class="content-wrapper">
                                                <h3><?php echo e(getTotalRidesByStatus(RideStatusEnum::COMPLETED, $start_date, $end_date) ?? 0); ?>

                                                </h3>
                                                <p><?php echo e(__('cabbooking::static.rides.completed')); ?></p>
                                            </div>
                                            <svg class="redirecting">
                                                <use
                                                    xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#arrow-right')); ?>">
                                                </use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('driver.index')): ?>
            <div class="col-xxl-8">
                <div class="row dashboard-default-row">
                    <?php if($roleName != CabBookingRoleEnum::DRIVER): ?>
                        <div class="col-xxl-3 col-xl-3 col-md-4 col-sm-6">
                            <a href="<?php echo e(route('admin.driver.index')); ?>">
                                <div class="card widgets widgets2">
                                    <div class="card-body p-0">
                                        <div class="widget-content">
                                            <div class="widget-wrapper">
                                                <div class="svg-wrapper">
                                                    <svg>
                                                        <use
                                                            xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#verified-drivers')); ?>">
                                                        </use>
                                                    </svg>
                                                </div>
                                                <div class="content-wrapper">
                                                    <h3><?php echo e(getTotalDrivers($start_date, $end_date, true)); ?></h3>

                                                </div>
                                            </div>
                                            <div class="bottom-content">
                                                <h4><?php echo e(__('cabbooking::static.widget.total_verified_drivers')); ?></h4>
                                                <div class="numbers-wrapper">
                                                    <?php
                                                        $verifiedDriversPercentage = getTotalDriversPercentage($start_date, $end_date, true);
                                                    ?>
                                                    <span class="<?php echo e($verifiedDriversPercentage['status'] == 'decrease' ? 'decreasing' : 'increasing'); ?>">
                                                        <svg>
                                                            <use
                                                                xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#' . ($verifiedDriversPercentage['status'] == 'decrease' ? 'decrease' : 'increase'))); ?>">
                                                            </use>
                                                        </svg>
                                                        <?php echo e($verifiedDriversPercentage['status'] == 'decrease' ? '-' : '+'); ?>

                                                        <?php echo e($verifiedDriversPercentage['percentage']); ?>%
                                                    </span>
                                                    <p data-bs-toggle="tooltip" data-bs-title=" <?php echo e(__('cabbooking::static.widget.widget_description')); ?>">
                                                        <?php echo e(__('cabbooking::static.widget.widget_description')); ?>

                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-md-4 col-sm-6">
                            <a href="<?php echo e(route('admin.driver.unverified-drivers')); ?>">
                                <div class="card widgets widgets2">
                                    <div class="card-body p-0">
                                        <div class="widget-content">
                                            <div class="widget-wrapper">
                                                <div class="svg-wrapper">
                                                    <svg>
                                                        <use
                                                            xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#unverified-drivers')); ?>">
                                                        </use>
                                                    </svg>
                                                </div>
                                                <div class="content-wrapper">
                                                    <h3><?php echo e(getTotalDrivers($start_date, $end_date, false)); ?></h3>
                                                </div>
                                            </div>
                                            <div class="bottom-content">
                                                <h4><?php echo e(__('cabbooking::static.widget.total_unverified_drivers')); ?></h4>
                                                <div class="numbers-wrapper">
                                                    <?php
                                                        $unverifiedDriversPercentage = getTotalDriversPercentage($start_date, $end_date, false);
                                                    ?>
                                                    <span class="<?php echo e($unverifiedDriversPercentage['status'] == 'decrease' ? 'decreasing' : 'increasing'); ?>">
                                                        <svg>
                                                            <use
                                                                xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#' . ($unverifiedDriversPercentage['status'] == 'decrease' ? 'decrease' : 'increase'))); ?>">
                                                            </use>
                                                        </svg>
                                                        <?php echo e($unverifiedDriversPercentage['status'] == 'decrease' ? '-' : '+'); ?>

                                                        <?php echo e($unverifiedDriversPercentage['percentage']); ?>%
                                                    </span>
                                                    <p data-bs-toggle="tooltip" data-bs-title=" <?php echo e(__('cabbooking::static.widget.widget_description')); ?>">
                                                        <?php echo e(__('cabbooking::static.widget.widget_description')); ?>

                                                    </p>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('rider.index')): ?>
                        <div class="col-xxl-3 col-xl-3 col-md-4 col-sm-6">
                            <a href="<?php echo e(route('admin.rider.index')); ?>">
                                <div class="card widgets widgets2">
                                    <div class="card-body p-0">
                                        <div class="widget-content">
                                            <div class="widget-wrapper">
                                                <div class="svg-wrapper">
                                                    <svg>
                                                        <use
                                                            xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#total-riders')); ?>">
                                                        </use>
                                                    </svg>
                                                </div>
                                                <div class="content-wrapper">
                                                    <h3><?php echo e(getTotalRiders($start_date, $end_date)); ?></h3>
                                                </div>
                                            </div>
                                            <div class="bottom-content">
                                                <h4><?php echo e(__('cabbooking::static.widget.total_riders')); ?></h4>
                                                <div class="numbers-wrapper">
                                                    <?php
                                                        $ridersPercentage = getTotalRidersPercentage($start_date, $end_date);
                                                    ?>
                                                    <span class="<?php echo e($ridersPercentage['status'] == 'decrease' ? 'decreasing' : 'increasing'); ?>">
                                                        <svg>
                                                            <use
                                                                xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#' . ($ridersPercentage['status'] == 'decrease' ? 'decrease' : 'increase'))); ?>">
                                                            </use>
                                                        </svg>
                                                        <?php echo e($ridersPercentage['status'] == 'decrease' ? '-' : '+'); ?>

                                                        <?php echo e($ridersPercentage['percentage']); ?>%
                                                    </span>
                                                    <p data-bs-toggle="tooltip" data-bs-title=" <?php echo e(__('cabbooking::static.widget.widget_description')); ?>">
                                                        <?php echo e(__('cabbooking::static.widget.widget_description')); ?>

                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ride.index')): ?>
                        <div class="col-xxl-3 col-xl-3 col-md-4 col-sm-6">
                            <a href="<?php echo e(route('admin.ride.index')); ?>">
                                <div class="card widgets widgets2">
                                    <div class="card-body p-0">
                                        <div class="widget-content">
                                            <div class="widget-wrapper">
                                                <div class="svg-wrapper">
                                                    <svg>
                                                        <use
                                                            xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#total-rides')); ?>">
                                                        </use>
                                                    </svg>
                                                </div>
                                                <div class="content-wrapper">
                                                    <h3><?php echo e(getTotalRides($start_date, $end_date)); ?></h3>
                                                </div>
                                            </div>
                                            <div class="bottom-content">
                                                <h4><?php echo e(__('cabbooking::static.widget.total_rides')); ?></h4>
                                                <div class="numbers-wrapper">
                                                    <?php
                                                        $ridesPercentage = getTotalRidesPercentage($start_date, $end_date);
                                                    ?>
                                                    <span class="<?php echo e($ridesPercentage['status'] == 'decrease' ? 'decreasing' : 'increasing'); ?>">
                                                        <svg>
                                                            <use
                                                                xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#' . ($ridesPercentage['status'] == 'decrease' ? 'decrease' : 'increase'))); ?>">
                                                            </use>
                                                        </svg>
                                                        <?php echo e($ridesPercentage['status'] == 'decrease' ? '-' : '+'); ?>

                                                        <?php echo e($ridesPercentage['percentage']); ?>%
                                                    </span>
                                                    <p data-bs-toggle="tooltip" data-bs-title=" <?php echo e(__('cabbooking::static.widget.widget_description')); ?>">
                                                        <?php echo e(__('cabbooking::static.widget.widget_description')); ?>

                                                    </p>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>

                    
                    <div class="col-xxl-3 col-xl-3 col-md-4 col-sm-6">
                        <div class="card widgets widgets2">
                            <div class="card-body p-0">
                                <div class="widget-content">
                                    <div class="widget-wrapper">
                                        <div class="svg-wrapper">
                                            <svg>
                                                <use
                                                    xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#total-revenue')); ?>">
                                                </use>
                                            </svg>
                                        </div>
                                        <div class="content-wrapper">
                                            <h3><?php echo e(formatCurrency(getTotalRidesEarnings($start_date, $end_date))); ?>

                                            </h3>

                                        </div>
                                    </div>
                                    <div class="bottom-content">
                                        <h4><?php echo e(__('cabbooking::static.widget.total_revenue')); ?></h4>
                                        <div class="numbers-wrapper">
                                                <?php
                                                    $revenuePercentage = getTotalRidesEarningsPercentage($start_date, $end_date);
                                                ?>
                                                <span class="<?php echo e($revenuePercentage['status'] == 'decrease' ? 'decreasing' : 'increasing'); ?>">
                                                    <svg>
                                                        <use
                                                            xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#' . ($revenuePercentage['status'] == 'decrease' ? 'decrease' : 'increase'))); ?>">
                                                        </use>
                                                    </svg>
                                                    <?php echo e($revenuePercentage['status'] == 'decrease' ? '-' : '+'); ?>

                                                    <?php echo e($revenuePercentage['percentage']); ?>%
                                                </span>
                                            <p data-bs-toggle="tooltip" data-bs-title=" <?php echo e(__('cabbooking::static.widget.widget_description')); ?>">
                                                <?php echo e(__('cabbooking::static.widget.widget_description')); ?>

                                            </p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    
                    <div class="col-xxl-3 col-xl-3 col-md-4 col-sm-6">
                        <div class="card widgets widgets2">
                            <div class="card-body p-0">
                                <div class="widget-content">
                                    <div class="widget-wrapper">
                                        <div class="svg-wrapper">
                                            <svg>
                                                <use
                                                    xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#offline-payment')); ?>">
                                                </use>
                                            </svg>
                                        </div>
                                        <div class="content-wrapper">
                                            <h3> <?php echo e(formatCurrency(getTotalRidesEarnings($start_date, $end_date, 'online'))); ?>

                                            </h3>
                                        </div>
                                    </div>
                                    <div class="bottom-content">
                                        <h4><?php echo e(__('cabbooking::static.widget.offline_payment')); ?></h4>
                                        <div class="numbers-wrapper">
                                                <?php
                                                    $offlinePaymentPercentage = getTotalRidesEarningsPercentage($start_date, $end_date, 'cash');
                                                ?>
                                                <span class="<?php echo e($offlinePaymentPercentage['status'] == 'decrease' ? 'decreasing' : 'increasing'); ?>">
                                                    <svg>
                                                        <use
                                                            xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#' . ($offlinePaymentPercentage['status'] == 'decrease' ? 'decrease' : 'increase'))); ?>">
                                                        </use>
                                                    </svg>
                                                    <?php echo e($offlinePaymentPercentage['status'] == 'decrease' ? '-' : '+'); ?>

                                                    <?php echo e($offlinePaymentPercentage['percentage']); ?>%
                                                </span>
                                            <p data-bs-toggle="tooltip" data-bs-title=" <?php echo e(__('cabbooking::static.widget.widget_description')); ?>">
                                                <?php echo e(__('cabbooking::static.widget.widget_description')); ?>

                                            </p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    
                    <div class="col-xxl-3 col-xl-3 col-md-4 col-sm-6">
                        <div class="card widgets widgets2">
                            <div class="card-body p-0">
                                <div class="widget-content">
                                    <div class="widget-wrapper">
                                        <div class="svg-wrapper">
                                            <svg>
                                                <use
                                                    xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#online-payment')); ?>">
                                                </use>
                                            </svg>
                                        </div>
                                        <div class="content-wrapper">
                                            <h3> <?php echo e(formatCurrency(getTotalRidesEarnings($start_date, $end_date, 'online'))); ?>

                                            </h3>
                                        </div>
                                    </div>
                                    <div class="bottom-content">
                                        <h4><?php echo e(__('cabbooking::static.widget.online_payment')); ?></h4>
                                        <div class="numbers-wrapper">
                                                <?php
                                                    $onlinePaymentPercentage = getTotalRidesEarningsPercentage($start_date, $end_date, 'online');
                                                ?>
                                                <span class="<?php echo e($onlinePaymentPercentage['status'] == 'decrease' ? 'decreasing' : 'increasing'); ?>">
                                                    <svg>
                                                        <use
                                                            xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#' . ($onlinePaymentPercentage['status'] == 'decrease' ? 'decrease' : 'increase'))); ?>">
                                                        </use>
                                                    </svg>
                                                    <?php echo e($onlinePaymentPercentage['status'] == 'decrease' ? '-' : '+'); ?>

                                                    <?php echo e($onlinePaymentPercentage['percentage']); ?>%
                                                </span>
                                            <p data-bs-toggle="tooltip" data-bs-title=" <?php echo e(__('cabbooking::static.widget.widget_description')); ?>">
                                                <?php echo e(__('cabbooking::static.widget.widget_description')); ?>

                                            </p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <?php if($roleName != CabBookingRoleEnum::DRIVER): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('withdraw_request.index')): ?>
                            <div class="col-xxl-3 col-xl-3 col-md-4 col-sm-6">
                                <a href="<?php echo e(route('admin.withdraw-request.index')); ?>">
                                    <div class="card widgets widgets2">
                                        <div class="card-body p-0">
                                            <div class="widget-content">
                                                <div class="widget-wrapper">
                                                    <div class="svg-wrapper">
                                                        <svg>
                                                            <use
                                                                xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#withdraw-request')); ?>">
                                                            </use>
                                                        </svg>
                                                    </div>
                                                    <div class="content-wrapper">
                                                        <h3><?php echo e(formatCurrency(getTotalWithdrawals($start_date, $end_date))); ?>

                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="bottom-content">
                                                    <h4><?php echo e(__('cabbooking::static.widget.withdraw_request')); ?></h4>
                                                    <div class="numbers-wrapper">
                                                        <?php
                                                            $withdrawRequestsPercentage = getTotalWithdrawRequestsPercentage($start_date, $end_date);
                                                        ?>
                                                        <span class="<?php echo e($withdrawRequestsPercentage['status'] == 'decrease' ? 'decreasing' : 'increasing'); ?>">
                                                            <svg>
                                                                <use
                                                                    xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#' . ($withdrawRequestsPercentage['status'] == 'decrease' ? 'decrease' : 'increase'))); ?>">
                                                                </use>
                                                            </svg>
                                                            <?php echo e($withdrawRequestsPercentage['status'] == 'decrease' ? '-' : '+'); ?>

                                                            <?php echo e($withdrawRequestsPercentage['percentage']); ?>%
                                                        </span>
                                                        <p data-bs-toggle="tooltip" data-bs-title=" <?php echo e(__('cabbooking::static.widget.widget_description')); ?>">
                                                            <?php echo e(__('cabbooking::static.widget.widget_description')); ?>

                                                        </p>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fleet-manager.index')): ?>
                        <?php if($roleName != CabBookingRoleEnum::FLEET_MANAGER && $roleName != CabBookingRoleEnum::DRIVER): ?>
                            <div class="col-xxl-3 col-xl-3 col-md-4 col-sm-6">

                                <a href="<?php echo e(route('admin.fleet-manager.index')); ?>">
                                    <div class="card widgets widgets2">
                                        <div class="card-body p-0">
                                            <div class="widget-content">
                                                <div class="widget-wrapper">
                                                    <div class="svg-wrapper">
                                                        <svg>
                                                            <use
                                                                xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#fleet-manager')); ?>">
                                                            </use>
                                                        </svg>
                                                    </div>
                                                    <div class="content-wrapper">
                                                        <h3><?php echo e(getTotalFleetManagers($start_date, $end_date)); ?></h3>
                                                    </div>
                                                </div>
                                                <div class="bottom-content">
                                                    <h4><?php echo e(__('cabbooking::static.widget.fleet_managers_info')); ?></h4>
                                                    <div class="numbers-wrapper">
                                                        <?php
                                                            $fleetManagersPercentage = getTotalFleetManagersPercentage($start_date, $end_date);
                                                        ?>
                                                        <span class="<?php echo e($fleetManagersPercentage['status'] == 'decrease' ? 'decreasing' : 'increasing'); ?>">
                                                            <svg>
                                                                <use
                                                                    xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#' . ($fleetManagersPercentage['status'] == 'decrease' ? 'decrease' : 'increase'))); ?>">
                                                                </use>
                                                            </svg>
                                                            <?php echo e($fleetManagersPercentage['status'] == 'decrease' ? '-' : '+'); ?>

                                                            <?php echo e($fleetManagersPercentage['percentage']); ?>%
                                                        </span>
                                                        <p data-bs-toggle="tooltip" data-bs-title=" <?php echo e(__('cabbooking::static.widget.widget_description')); ?>">
                                                            <?php echo e(__('cabbooking::static.widget.widget_description')); ?>

                                                        </p>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('driver.index')): ?>
                        <?php if($roleName != CabBookingRoleEnum::DRIVER): ?>
                            <div class="col-xxl-3 col-xl-3 col-md-4 col-sm-6">
                                <a href="<?php echo e(route('admin.vehicle-info.index')); ?>">
                                    <div class="card widgets widgets2">
                                        <div class="card-body p-0">
                                            <div class="widget-content">
                                                <div class="widget-wrapper">
                                                    <div class="svg-wrapper">
                                                        <svg>
                                                            <use
                                                                xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#fleet-vehicles')); ?>">
                                                            </use>
                                                        </svg>
                                                    </div>
                                                    <div class="content-wrapper">
                                                        <h3><?php echo e(getFleetVehicles($start_date, $end_date, true)); ?></h3>
                                                    </div>
                                                </div>
                                                <div class="bottom-content">
                                                    <h4><?php echo e(__('cabbooking::static.widget.fleet_vehicle_type')); ?></h4>
                                                    <div class="numbers-wrapper">
                                                        <?php
                                                            $fleetVehiclesPercentage = getFleetVehiclesPercentage($start_date, $end_date, true);
                                                        ?>
                                                        <span class="<?php echo e($fleetVehiclesPercentage['status'] == 'decrease' ? 'decreasing' : 'increasing'); ?>">
                                                            <svg>
                                                                <use
                                                                    xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#' . ($fleetVehiclesPercentage['status'] == 'decrease' ? 'decrease' : 'increase'))); ?>">
                                                                </use>
                                                            </svg>
                                                            <?php echo e($fleetVehiclesPercentage['status'] == 'decrease' ? '-' : '+'); ?>

                                                            <?php echo e($fleetVehiclesPercentage['percentage']); ?>%
                                                        </span>
                                                        <p data-bs-toggle="tooltip" data-bs-title=" <?php echo e(__('cabbooking::static.widget.widget_description')); ?>">
                                                            <?php echo e(__('cabbooking::static.widget.widget_description')); ?>

                                                        </p>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dispatcher.index')): ?>
                        <?php if($roleName != CabBookingRoleEnum::DISPATCHER): ?>
                            <div class="col-xxl-3 col-xl-3 col-md-4 col-sm-6">
                                <a href="<?php echo e(route('admin.dispatcher.index')); ?>">

                                    <div class="card widgets widgets2">
                                        <div class="card-body p-0">
                                            <div class="widget-content">
                                                <div class="widget-wrapper">
                                                    <div class="svg-wrapper">
                                                        <svg>
                                                            <use
                                                                xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#dispatcher')); ?>">
                                                            </use>
                                                        </svg>
                                                    </div>
                                                    <div class="content-wrapper">
                                                        <h3><?php echo e(getTotalDispatchers($start_date, $end_date, false)); ?></h3>
                                                    </div>
                                                </div>
                                                <div class="bottom-content">
                                                    <h4><?php echo e(__('cabbooking::static.widget.dispatcher')); ?></h4>
                                                    <div class="numbers-wrapper">
                                                        <?php
                                                            $dispatchersPercentage = getTotalDispatchersPercentage($start_date, $end_date);
                                                        ?>
                                                        <span class="<?php echo e($dispatchersPercentage['status'] == 'decrease' ? 'decreasing' : 'increasing'); ?>">
                                                            <svg>
                                                                <use
                                                                    xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#' . ($dispatchersPercentage['status'] == 'decrease' ? 'decrease' : 'increase'))); ?>">
                                                                </use>
                                                            </svg>
                                                            <?php echo e($dispatchersPercentage['status'] == 'decrease' ? '-' : '+'); ?>

                                                            <?php echo e($dispatchersPercentage['percentage']); ?>%
                                                        </span>
                                                        <p data-bs-toggle="tooltip" data-bs-title=" <?php echo e(__('cabbooking::static.widget.widget_description')); ?>">
                                                            <?php echo e(__('cabbooking::static.widget.widget_description')); ?>

                                                        </p>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if($roleName == CabBookingRoleEnum::FLEET_MANAGER): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fleet_wallet.index')): ?>
                            <div class="col-xxl-3 col-xl-3 col-md-4 col-sm-6">
                                <div class="card widgets widgets2">
                                    <div class="card-body p-0">
                                        <div class="widget-content">
                                            <div class="widget-wrapper">
                                                <div class="svg-wrapper">
                                                    <svg>
                                                        <use
                                                            xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#dispatcher')); ?>">
                                                        </use>
                                                    </svg>
                                                </div>
                                                <div class="content-wrapper">
                                                    <h3> <?php echo e(getDefaultCurrency()?->symbol); ?><?php echo e(number_format(getFleetWalletBalance(getCurrentUserId(), $start_date, $end_date), 2)); ?>

                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="bottom-content">
                                                <h4><?php echo e(__('cabbooking::static.widget.Wallet_balance')); ?></h4>
                                                <div class="numbers-wrapper">
                                                    <?php
                                                        $walletsPercentage = getTotalWalletsPercentage($start_date, $end_date);
                                                    ?>
                                                    <span class="<?php echo e($walletsPercentage['status'] == 'decrease' ? 'decreasing' : 'increasing'); ?>">
                                                        <svg>
                                                            <use
                                                                xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#' . ($walletsPercentage['status'] == 'decrease' ? 'decrease' : 'increase'))); ?>">
                                                            </use>
                                                        </svg>
                                                        <?php echo e($walletsPercentage['status'] == 'decrease' ? '-' : '+'); ?>

                                                        <?php echo e($walletsPercentage['percentage']); ?>%
                                                    </span>
                                                    <p data-bs-toggle="tooltip" data-bs-title=" <?php echo e(__('cabbooking::static.widget.widget_description')); ?>">
                                                        <?php echo e(__('cabbooking::static.widget.widget_description')); ?>

                                                    </p>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <div class="col-xxl-3 col-xl-3 col-md-4 col-sm-6">
                        <a href="<?php echo e(route('admin.peakZone.index')); ?>">
                            <div class="card widgets widgets2">
                                <div class="card-body p-0">
                                    <div class="widget-content">
                                        <div class="widget-wrapper">
                                            <div class="svg-wrapper">
                                                <svg>
                                                    <use
                                                        xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#peak-zone')); ?>">
                                                    </use>
                                                </svg>
                                            </div>
                                            <div class="content-wrapper">
                                                <h3><?php echo e(getPeakZones($start_date, $end_date)); ?></h3>
                                            </div>
                                        </div>
                                        <div class="bottom-content">
                                            <h4><?php echo e(__('cabbooking::static.widget.peak_zone')); ?></h4>
                                            <div class="numbers-wrapper">
                                                    <?php
                                                        $peakZonesPercentage = getPeakZonesPercentage($start_date, $end_date);
                                                    ?>
                                                    <span class="<?php echo e($peakZonesPercentage['status'] == 'decrease' ? 'decreasing' : 'increasing'); ?>">
                                                        <svg>
                                                            <use
                                                                xlink:href="<?php echo e(asset('images/dashboard/details/icon-sprite.svg#' . ($peakZonesPercentage['status'] == 'decrease' ? 'decrease' : 'increase'))); ?>">
                                                            </use>
                                                        </svg>
                                                        <?php echo e($peakZonesPercentage['status'] == 'decrease' ? '-' : '+'); ?>

                                                        <?php echo e($peakZonesPercentage['percentage']); ?>%
                                                    </span>
                                                <p data-bs-toggle="tooltip" data-bs-title=" <?php echo e(__('cabbooking::static.widget.widget_description')); ?>" >
                                                <?php echo e(__('cabbooking::static.widget.widget_description')); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /var/www/gocab/Modules/CabBooking/resources/views/admin/widgets/statistics.blade.php ENDPATH**/ ?>