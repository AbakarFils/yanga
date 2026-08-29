<?php use \Illuminate\Support\Arr; ?>
<?php
    $ridestatuscolorClasses = getRideStatusColorClasses();
    $dateRange = getStartAndEndDate(request('sort'), request('start'), request('end'));
    $start_date = $dateRange['start'] ?? null;
    $end_date = $dateRange['end'] ?? null;
    $serviceCategories = getAllServices();
?>



<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ride.index')): ?>
    <div class="col-xxl-5 col-xl-6">
        <div class="card top-drivers-card p-0">
            <div class="card-header">
               <h3><?php echo e(__('cabbooking::static.widget.recent_rides')); ?></h3>
               <a href="<?php echo e(route('admin.ride.index')); ?>"><?php echo e(__('cabbooking::static.widget.view_all')); ?></a>
           </div>
           <div class="rides-tab analytics-section">
               <ul class="nav nav-tabs horizontal-tab custom-scroll" id="ride-tabs" role="tablist">
                   <?php $__empty_1 = true; $__currentLoopData = $serviceCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $serviceCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                       <li class="nav-item" role="presentation">
                           <a class="nav-link <?php if($key === 0): ?> active <?php endif; ?>"
                               id="tab-<?php echo e($serviceCategory->id); ?>-tab" data-bs-toggle="tab"
                               href="#tab-<?php echo e($serviceCategory->id); ?>" role="tab"
                               aria-controls="tab-<?php echo e($serviceCategory->id); ?>"
                               aria-selected="<?php echo e($key === 0 ? 'true' : 'false'); ?>">
                               <?php echo e($serviceCategory->name); ?>

                           </a>
                       </li>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                       <li class="nav-item" role="presentation">
                           <a class="nav-link disabled" href="#" role="tab" aria-disabled="true">
                               <?php echo e(__('cabbooking::static.widget.no_categories_available')); ?>

                           </a>
                       </li>
                   <?php endif; ?>
               </ul>
           </div>
            <div class="recent-rides-card custom-scrollbar">

                <div class="card-body top-drivers recent-rides p-0 " >
                    <div class="tab-content">

                        <?php $__empty_1 = true; $__currentLoopData = $serviceCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $serviceCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                            <div class="tab-pane fade <?php if($key === 0): ?> show active <?php endif; ?>"
                                id="tab-<?php echo e($serviceCategory->id); ?>" role="tabpanel"
                                aria-labelledby="tab-<?php echo e($serviceCategory->id); ?>-tab">

                                <?php
                                    $categoryRides = getRecentRides($start_date, $end_date, $serviceCategory?->id);
                                ?>
                                <?php if(count($categoryRides)): ?>
                                <table class="recent-rides-table">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('cabbooking::static.widget.ride_id')); ?></th>
                                            <th><?php echo e(__('cabbooking::static.widget.driver_name')); ?></th>
                                            <th><?php echo e(__('cabbooking::static.widget.distance')); ?></th>
                                            <th><?php echo e(__('cabbooking::static.widget.status')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_2 = true; $__currentLoopData = $categoryRides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ride): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                            <?php if($ride?->driver && $ride): ?>
                                                <tr>
                                                    <td>
                                                        <a href="<?php echo e(route('admin.ride.details', $ride?->id)); ?>">
                                                            <span class="id-wrapper">#<?php echo e($ride?->ride_number ?? 'N/A'); ?></span>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div class="driver-info">
                                                            <?php if($ride?->driver?->profile_image?->original_url): ?>
                                                            <img src="<?php echo e($ride?->driver?->profile_image?->original_url); ?>" alt="">
                                                            <?php else: ?>
                                                                <div class="initial-letter">
                                                                    <span><?php echo e(strtoupper($ride?->driver?->name[0])); ?></span>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div>
                                                                <h4><?php echo e($ride?->driver?->name ?? 'N/A'); ?></h4>
                                                                <span><?php if(isDemoModeEnabled()): ?>
                                                                    <?php echo e(__('cabbooking::static.demo_mode')); ?>

                                                                <?php else: ?>
                                                                    <?php echo e($ride?->driver?->email); ?>

                                                                <?php endif; ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?php echo e($ride?->distance ?? 0); ?> <?php echo e(ucfirst($ride?->distance_unit ?? 'N/A')); ?> </td>
                                                    <td>
                                                        <?php if($ride?->ride_status): ?>
                                                        <span class="status <?php echo e($ride?->ride_status?->slug); ?>"><?php echo e($ride?->ride_status?->name); ?></span>
                                                        <?php else: ?>
                                                        <span class="status secondary">N/A</span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>

                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <?php else: ?>
                                 <div class="table-no-data">
                                                    <img src="<?php echo e(asset('images/dashboard/data-not-found.svg')); ?>"
                                                        alt="data not found" />
                                                    <h6 class="text-center">
                                                        <?php echo e(__('cabbooking::static.widget.no_data_available')); ?></h6>
                                                </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div>N/A</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

    </div>
</div>
<?php endif; ?>
<?php /**PATH /var/www/gocab/Modules/CabBooking/resources/views/admin/widgets/recent-rides.blade.php ENDPATH**/ ?>