<?php $__env->startPush('css'); ?>
    <!-- aos css -->
    <link rel="preload" as="style" href="<?php echo e(asset('front/css/aos.css')); ?>" onload="this.onload=null;this.rel='stylesheet'">

    <!-- wow animate css link -->
    <link rel="stylesheet" href="<?php echo e(asset('front/css/vendors/wow.css')); ?>" media="print" onload="this.media='all'">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('front/css/vendors/wow-animate.css')); ?>" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="https://public.codepenassets.com/css/normalize-5.0.0.min.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title', __('static.landing_pages.landing_page')); ?>
<?php $__env->startSection('content'); ?>
    <?php
        $classes = ['ride-box', 'user-box', 'driver-box', 'rating-box', 'ride-box'];
        $blogs = getBlogsByIds(@$content['blog']['blogs'] ?? []);
        $faqs = getFaqsByIds(@$content['faq']['faqs'] ?? []);
        $half = ceil(count($faqs) / 2);
        $testimonials = getTestimonialByIds(@$content['testimonial']['testimonials'] ?? []);
    ?>
    <?php if((int) $content['home']['status']): ?>
        <section class="home-section" id="home">
            <div class="custom-container container">
                <div class="home-content">
                    <div class="row">
                        <div class="col-xl-6 col-xxl-5  col-lg-6">
                            <div class="card content-card">
                                <div class="card-body">
                                    <div class="content-wrapper">
                                        <a href="<?php echo e(@$content['home']['top_btn_url']); ?>"><?php echo e(@$content['home']['top_btn_text']); ?></a>
                                        <h1><?php echo e(@$content['home']['title']); ?></h1>
                                        <p><?php echo e(@$content['home']['description']); ?></p>
                                        <div class="button-group">
                                            <?php $__empty_1 = true; $__currentLoopData = $content['home']['button']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $button): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <?php if($index == 0): ?>
                                                    <a class="btn btn-secondary" href="<?php echo e($button['url'] ?? '#'); ?>"
                                                        target="_blank">
                                                        <?php echo e($button['text']); ?>

                                                    </a>
                                                <?php else: ?>
                                                    <a class="btn btn-primary" href="<?php echo e($button['url'] ?? '#'); ?>"
                                                        target="_blank">
                                                        <?php echo e($button['text']); ?>

                                                    </a>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="social-content">
                                        <div class="content-wrapper">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <img src="<?php echo e(asset(@$content['home']['info_image'])); ?>" alt=""
                                                            loading="lazy">
                                                    </a>
                                                </li>
                                            </ul>
                                            <h3><?php echo e(@$content['home']['info_text']); ?></h3>
                                        </div>
                                        <p><?php echo e(@$content['home']['info_description']); ?></p>
                                        <div class="store-group">
                                            <?php if(@$content['home']['playstore_url']): ?>
                                                <a href="<?php echo e(@$content['home']['playstore_url']); ?>">
                                                    <img src="<?php echo e(asset('front/images/store/1.png')); ?>" alt="">
                                                </a>
                                            <?php endif; ?>
                                            <?php if(@$content['home']['appstore_url']): ?>
                                                <a href="<?php echo e(@$content['home']['appstore_url']); ?>">
                                                    <img src="<?php echo e(asset('front/images/store/2.png')); ?>" alt="">
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-xxl-7  col-lg-6 d-lg-block d-none">
                            
                            <div class="card image-card">
                                <div class="card-body">
                                    <div class="image-wrapper">
                                        <img src="<?php echo e(asset(@$content['home']['right_phone_image'])); ?>" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- Home Section End -->

    <!-- Statistics section start -->
    <?php if((int) $content['statistics']['status']): ?>
        <section class="counter-section overflow-hidden">
            <div class="row counters g-3">
                <?php $__empty_1 = true; $__currentLoopData = $content['statistics']['counters'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $counter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter-wrapper">
                            <h3>
                                <span class="counter" data-target="<?php echo e($counter['count']); ?>">
                                    <?php echo e($counter['count']); ?>

                                </span>
                            </h3>
                            <p><?php echo e($counter['description']); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>
    <!-- Experience section end -->

    <!-- Best choice section start -->
    <?php if($content['feature']['status'] == 1): ?>
        <section class="best-choice-section-2" id="why_cab_booking">
            <div class="container">
                <div class="title">
                    <h2><?php echo e(@$content['feature']['title']); ?></h2>
                    <div class="d-inline-block">
                        <p>
                            <?php echo e(@$content['feature']['description']); ?>

                        </p>
                    </div>
                </div>
                <div class="wrapper">
                    <div class="cards-content">
                        <?php $__empty_1 = true; $__currentLoopData = $content['feature']['images'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="card-wrapper">
                                <?php
                                    $no = ++$index;
                                ?>
                                <div class="card-content card-content-<?php echo e($no); ?> one">
                                    <div class="best-choice-card card-<?php echo e($no); ?>">
                                        <div class="best-choice-content">
                                            <h4><?php echo e(@$image['title']); ?></h4>
                                            <p><?php echo e(@$image['description']); ?></p>
                                        </div>
                                        <?php if(file_exists_public(@$image['image'])): ?>
                                            <div class="best-choice-image">
                                                <img class="img-fluid" alt="" src="<?php echo e(@asset($image['image'])); ?>"
                                                    loading="eager">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- Best choice section end -->

    <!-- Rides screen section start -->
    <?php if($content['ride']['status'] == 1): ?>

        <section class="sass-team-section" id="how_it_works">
            <div class="container">
                <div class="title">
                    <h2><?php echo e(@$content['ride']['title']); ?></h2>
                    <p><?php echo e(@$content['ride']['description']); ?></p>
                </div>

                <div class="team-main-box">
                    <div class="steps-wrapper">
                        <div class="steps-content-wrapper">
                            <div class="bar"><span class="bar__fill"></span></div>
                            <?php $__empty_1 = true; $__currentLoopData = $content['ride']['step']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if(($index + 1) & 1): ?>
                                    <div class="row g-0" id="step-<?php echo e($index + 1); ?>">
                                        <ul class="col-md-6">
                                            <li class="step feature-text texts bg-color" id="">
                                                <?php if(file_exists_public($step['image'])): ?>
                                                    <img class="img-fluid" alt="screen-img"
                                                        src="<?php echo e(asset($step['image'])); ?>" loading="lazy">
                                                <?php endif; ?>
                                            </li>
                                        </ul>
                                        <ul class="col-md-6">
                                            <li class="step feature-text">
                                                <div class="section-title ">
                                                    <span
                                                        class="bg-color"><?php echo e(str_pad($index + 1, 2, '0', STR_PAD_LEFT)); ?></span>
                                                    <h2><?php echo e($step['title']); ?></h2>
                                                    <p>
                                                        <?php echo e($step['description']); ?>

                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                <?php else: ?>
                                    <div class="row g-0" id="step-2">
                                        <ul class="col-md-6 order-md-1 order-2">
                                            <li class="step feature-text">
                                                <div class="section-title title-left">
                                                    <span
                                                        class="bg-color"><?php echo e(str_pad($index + 1, 2, '0', STR_PAD_LEFT)); ?></span>
                                                    <h2><?php echo e($step['title']); ?></h2>
                                                    <p>
                                                        <?php echo e($step['description']); ?>

                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="col-md-6 order-md-2 order-1">
                                            <li class="step feature-text texts bg-color" id="">
                                                <?php if(file_exists_public($step['image'])): ?>
                                                    <img class="img-fluid" alt="screen-img"
                                                        src="<?php echo e(asset($step['image'])); ?>" loading="lazy">
                                                <?php endif; ?>
                                            </li>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- Rides screen section end -->

    <!-- FAQ section start -->
    <?php if($content['faq']['status'] == 1): ?>
        <section class="faq-section section-b-space" id="faqs">
            <div class="faq-container">
                <div class="title">
                    <h2 class="wow fadeInDown"><?php echo e($content['faq']['title']); ?></h2>
                    <div class="d-inline-block">
                        <p class="wow fadeInDown"><?php echo e($content['faq']['sub_title']); ?></p>
                    </div>
                </div>
                <div class="row gy-lg-0 gy-3">
                    <div class="col-lg-12">
                        <div class="accordion faq-accordion">
                            <?php $__empty_1 = true; $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="accordion-item wow fadeInUp">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button <?php echo e($index === 0 ? '' : 'collapsed'); ?>"
                                            data-bs-toggle="collapse" data-bs-target="#faq<?php echo e($index + 1); ?>">
                                            <?php echo e($faq['title']); ?>

                                        </button>
                                    </h2>
                                    <div id="faq<?php echo e($index + 1); ?>"
                                        class="accordion-collapse collapse <?php echo e($index === 0 ? 'show' : ''); ?>">
                                        <div class="accordion-body">
                                            <p><?php echo e($faq['description']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <h3 class="text-center">FAQ not found!</h3>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- FAQ section end -->

    <!-- Blog section start -->
    <?php if($content['blog']['status'] == 1): ?>
        <section class="blog-section section-b-space bg-section" id="blogs">
            <div class="container">
                <div class="title">
                    <h2 class="wow fadeInDown"><?php echo e($content['blog']['title']); ?></h2>
                    <div class="d-inline-block">
                        <p class="wow fadeInDown"><?php echo e($content['blog']['sub_title']); ?></p>
                    </div>
                    <?php if(count($blogs)): ?>
                        <a href="<?php echo e(route('web.blog.index')); ?>"><?php echo e(__('static.landing_pages.view_all')); ?> <i
                                class="ri-arrow-right-s-line"></i></a>
                    <?php endif; ?>
                </div>

                <div class="swiper blog-swiper pagination-box swiper-initialized swiper-horizontal swiper-backface-hidden">
                    <div class="swiper-wrapper" id="swiper-wrapper-74f620c8f3afa81d" aria-live="polite">
                        <?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="swiper-slide wow fadeInUp">
                                <div class="blog-box">
                                    <div class="blog-image">
                                        <a href="<?php echo e(route('blog.slug', @$blog['slug'])); ?>">
                                            <img class="img-fluid"
                                                src="<?php echo e(asset($blog['blog_thumbnail']['original_url'] ?? '')); ?>"
                                                alt="<?php echo e(@$blog['slug']); ?>" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-bottom">
                                            <h6>
                                                <?php echo e($blog['created_at'] ? \Carbon\Carbon::parse($blog['created_at'])->format('d M, Y') : ''); ?>

                                            </h6>
                                        </div>
                                        <a href="<?php echo e(route('blog.slug', @$blog['slug'])); ?>">
                                            <h5><?php echo e($content['blog']['title']); ?></h5>
                                        </a>
                                        <p><?php echo e($content['blog']['sub_title']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="no-data-found">
                                <img class="img-fluid" src="<?php echo e(asset('front/images/blog_not_found.svg')); ?>"
                                    loading="lazy">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Blog section end -->

    <!-- Comment section start -->
    <?php if($content['testimonial']['status'] == 1): ?>
        <section class="comment-section section-b-space wow fadeIn" id="testimonials">
            <div class="container">
                <div class="title">
                    <h2 class="wow fadeInDown"><?php echo e(@$content['testimonial']['title']); ?></h2>
                    <div class="d-inline-block">
                        <p class="wow fadeInDown"><?php echo e(@$content['testimonial']['sub_title']); ?></p>
                    </div>
                </div>

                <div class="swiper comment-slider pagination-box swiper-initialized swiper-horizontal swiper-backface-hidden">
                    <div class="swiper-wrapper wow fadeInUp">
                        <?php $__empty_1 = true; $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="swiper-slide swiper-slide-next">
                                <div class="comment-box">
                                    <div class="top-comment">
                                        <img class="img-fluid" alt="<?php echo e($testimonial?->title); ?>"
                                            src="<?php echo e(asset($testimonial?->profile_image?->asset_url ?? '')); ?>"
                                            loading="lazy">
                                        <h5><?php echo e($testimonial?->title); ?></h5>
                                    </div>
                                    <p class="comment-contain"><?php echo e($testimonial?->description); ?></p>
                                    <div class="rating-box">
                                        <h6>
                                            <svg>
                                                <use xlink:href="<?php echo e(asset('front/images/star.svg#star')); ?>">
                                            </svg>
                                            (<?php echo e(number_format($testimonial?->rating, 1)); ?>)
                                        </h6>

                                        <svg class="quotes-icon">
                                            <use xlink:href="<?php echo e(asset('front/images/quotes-right.svg#quotes-right')); ?>">
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="no-data-found">
                                <img class="img-fluid" src="<?php echo e(asset('front/images/testimonial_not_found.svg')); ?>"
                                    loading="lazy">
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <!-- WOW JS -->
    <script src="<?php echo e(asset('front/js/wow.js')); ?>"></script>
    <script src='https://unpkg.com/gsap@3/dist/gsap.min.js'></script>
    <script src='https://unpkg.com/gsap@3/dist/ScrollTrigger.min.js'></script>
    <script>
        $(document).ready(function() {
            new WOW().init();

            $(window).on('load', function() {
                setTimeout(function() {
                    $('#fullScreenLoader').fadeOut('slow', function() {
                        $(this).remove();
                    });
                }, 3500);
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const wrappers = document.querySelectorAll(".steps-content-wrapper");
            const progressFill = document.querySelector(".bar__fill");
            const bar = document.querySelector(".bar");

            if (!wrappers.length || !progressFill || !bar) return;

            wrappers.forEach(wrapper => {

                const rows = wrapper.querySelectorAll(".row");

                function updateBarFillSmooth() {
                    const rect = wrapper.getBoundingClientRect();
                    const windowHeight = window.innerHeight;

                    const totalScrollable = rect.height - windowHeight;
                    if (totalScrollable <= 0) return;

                    const scrollProgress = Math.min(
                        Math.max(-rect.top / totalScrollable, 0),
                        1
                    );

                    gsap.to(progressFill, {
                        height: scrollProgress * bar.offsetHeight + "px",
                        duration: 0.25,
                        ease: "power2.out"
                    });
                }

                function updateActiveStep() {
                    let activeRowIndex = 0;
                    const triggerLine = window.innerHeight * 0.55;

                    rows.forEach((row, index) => {
                        const rect = row.getBoundingClientRect();
                        if (rect.top <= triggerLine) {
                            activeRowIndex = index;
                        }
                    });

                    rows.forEach((row, index) => {
                        const features = row.querySelectorAll(".feature-text");
                        features.forEach(feature => {
                            feature.classList.toggle("active", index === activeRowIndex);
                        });
                    });
                }

                function onScroll() {
                    updateBarFillSmooth();
                    updateActiveStep();
                }

                window.addEventListener("scroll", onScroll);

                onScroll();
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('front.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/gocab/resources/views/front/home/index.blade.php ENDPATH**/ ?>