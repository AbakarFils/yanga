<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendors/flatpickr.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('title', __('static.dashboard')); ?>
 <?php $__env->startSection('content'); ?>
 <div class="row dashboard-default">
      <div class="col-12">
            <div class="default-sorting mt-0">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="welcome-box">
                            <div class="d-flex">
                                
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <form action="<?php echo e(route('admin.dashboard.index')); ?>" method="GET" id="sort-form">
                            <div class="support-title sorting m-0">
                                
                            </div>

                            <?php
                                $startDate = request('start');
                                $endDate = request('end');
                                $selectedRange = $startDate && $endDate ? "$startDate to $endDate" : '';
                            ?>

                            <div class="form-group dashboard-datepicker <?php echo e(request('sort') == 'custom' ? '' : 'd-none'); ?>" id="custom-date-range">
                                <input type="text" class="form-control filter-dropdown" id="start_end_date"
                                    name="start_end_date" placeholder="<?php echo e(__('static.select_date')); ?>"
                                    value="<?php echo e($selectedRange); ?>">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
     <?php $__currentLoopData = $widgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <?php echo $widget['callback']($widget['data']); ?>

     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </div>
<?php $__env->stopSection(); ?> 

 <?php $__env->startPush('scripts'); ?>
    <script defer src="<?php echo e(asset('js/apex-chart.js')); ?>"></script>
    <script defer src="<?php echo e(asset('js/custom-apexchart.js')); ?>"></script>
    <script src="<?php echo e(asset('js/flatpickr/flatpickr.js')); ?>"></script>
    <script src="<?php echo e(asset('js/flatpickr/rangePlugin.js')); ?>"></script> 


    <script>
        (function ($) {
            "use strict";

            $(document).ready(function () {
                const $sortDropdown = $("#sort");
                const $customDateRange = $("#custom-date-range");
                const $startEndDate = $("#start_end_date");
                const $animationSlides = $(".animation-slides");

                if ($sortDropdown.val() === "custom") {
                    $customDateRange.removeClass("d-none");
                }

                $sortDropdown.on("change", function () {
                    const selectedSort = $(this).val();
                    const urlParams = new URLSearchParams(window.location.search);

                    if (selectedSort === "custom") {
                        $customDateRange.removeClass("d-none");
                    } else {
                        $customDateRange.addClass("d-none");
                        urlParams.delete("start");
                        urlParams.delete("end");
                        urlParams.set("sort", selectedSort);
                        window.location.href = `${window.location.pathname}?${urlParams.toString()}`;
                    }
                });


                 // Initialize Flatpickr Date Range Picker
                if ($startEndDate.length) {
                    flatpickr("#start_end_date", {
                        mode: "range",
                        dateFormat: "m-d-Y",
                        defaultDate: "<?php echo e($selectedRange); ?>",
                        onClose: function (selectedDates, dateStr, instance) {
                            if (selectedDates.length === 2) {
                                const startDate = flatpickr.formatDate(selectedDates[0], "m-d-Y");
                                const endDate = flatpickr.formatDate(selectedDates[1], "m-d-Y");
                                const urlParams = new URLSearchParams(window.location.search);
                                urlParams.set("sort", "custom");
                                urlParams.set("start", startDate);
                                urlParams.set("end", endDate);
                                history.pushState(null, null, `${window.location.pathname}?${urlParams.toString()}`);
                                location.reload();

                            }
                        }
                    });
                }


                // Initialize Flatpickr Date Range Picker
                if ($startEndDate.length) {
                    flatpickr("#start_end_date", {
                        mode: "range",
                        dateFormat: "m-d-Y",
                        defaultDate: "<?php echo e($selectedRange); ?>",
                        onClose: function (selectedDates, dateStr, instance) {
                            if (selectedDates.length === 2) {
                                const startDate = flatpickr.formatDate(selectedDates[0], "m-d-Y");
                                const endDate = flatpickr.formatDate(selectedDates[1], "m-d-Y");
                                const urlParams = new URLSearchParams(window.location.search);
                                urlParams.set("sort", "custom");
                                urlParams.set("start", startDate);
                                urlParams.set("end", endDate);
                                history.pushState(null, null, `${window.location.pathname}?${urlParams.toString()}`);
                                location.reload();

                            }
                        }
                    });
                }

                // Initialize Slick Slider if element exists
                if ($animationSlides.length) {
                    $animationSlides.slick({
                        slidesToShow: 1,
                        vertical: true,
                        autoplay: true,
                        autoplaySpeed: 1200,
                        arrows: false,
                    });

                    const slides = [
                        "<p><?php echo e(__('static.slides.first_slide')); ?></p>",
                        "<p><?php echo e(__('static.slides.second_slide')); ?></p>",
                        "<p><?php echo e(__('static.slides.third_slide')); ?></p>",
                    ];

                    slides.forEach(slide => {
                        $animationSlides.slick("slickAdd", slide);
                    });
                }
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?> 

<?php $__env->startPush('scripts'); ?>
    <script defer src="<?php echo e(asset('js/apex-chart.js')); ?>"></script>
    <script defer src="<?php echo e(asset('js/custom-apexchart.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/gocab/resources/views/admin/dashboard/index.blade.php ENDPATH**/ ?>