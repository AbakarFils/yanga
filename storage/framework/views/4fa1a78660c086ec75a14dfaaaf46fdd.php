<?php use \App\Models\Blog; ?>
<?php use \App\Enums\RoleEnum; ?>
<?php
    $dateRange = getStartAndEndDate(request('sort'), request('start'), request('end'));
    $start_date = $dateRange['start'] ?? null;
    $end_date = $dateRange['end'] ?? null;
    $blogs = Blog::where('status', true)
        ->orderby('created_at')
        ->limit(2)
        ?->whereBetween('created_at', [$start_date, $end_date])
        ->get();
?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog.index')): ?>
    
    <div class="col-xl-6">
        <div class="card recent-blog p-0">
            <div class="card-header">
                <h3>
                    <?php echo e(__('static.blogs.recent_blog')); ?>

                </h3>
                <a href="<?php echo e(route('admin.blog.index')); ?>"><span><?php echo e(__('static.view_all')); ?></span></a>
            </div>
            <div class="card-body">
                <div class="recent-blogs">
                    <ul>
                        <?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php
                                $route = route('admin.blog.edit', [$blog->id]) . '?locale=' . app()->getLocale();
                            ?>
                            <li>
                                <div class="blog-wrapper">
                                    <?php
                                        $route =
                                            route('admin.blog.edit', [$blog->id]) . '?locale=' . app()->getLocale();
                                    ?>
                                    <a href="<?php echo e($route); ?>">
                                        <img src="<?php echo e(asset($blog?->blog_thumbnail?->asset_url ?? '')); ?>"
                                            alt="<?php echo e($blog->title); ?>">
                                    </a>
                                    <div class="image-wrapper">
                                        <span class="date-aligns">
                                            <?php echo e($blog->created_at->format('d M, Y')); ?>

                                        </span>
                                        <h4>

                                            <?php echo e($blog->title); ?>

                                        </h4>
                                        <div class="read-aligns">
                                            <p>
                                                <?php echo e($blog->description); ?>

                                                <span> <a
                                                        href="<?php echo e(route('blog.slug', @$blog['slug'])); ?>"><?php echo e(__('static.blogs.read_more')); ?></a></span>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="table-no-data">
                                <img src = "<?php echo e(asset('images/dashboard/data-not-found.svg')); ?>" alt="data not found">
                                <h6 class="text-center"><?php echo e(__('static.widgets.no_data_available')); ?></h6>
                            </div>
                        <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php /**PATH /var/www/gocab/resources/views/admin/widgets/top-blogs.blade.php ENDPATH**/ ?>