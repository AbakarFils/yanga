<?php use \Modules\Ticket\Models\Ticket; ?>
<?php use \App\Enums\RoleEnum; ?>
<?php
    $dateRange = getStartAndEndDate(request('sort'), request('start'), request('end'));
    $start_date = $dateRange['start'] ?? null;
    $end_date = $dateRange['end'] ?? null;
    $roleName = getCurrentRoleName();
?>

<?php if($roleName == RoleEnum::ADMIN): ?>
<?php
    $tickets = Ticket::orderby('created_at')
        ?->limit(3)?->whereBetween('created_at', [$start_date, $end_date])?->get();
?>
<?php else: ?>
<?php
    $tickets = Ticket::orderby('created_at')
        ?->where('user_id', getCurrentUserId())
        ?->limit(3)?->whereBetween('created_at', [$start_date, $end_date])
        ?->get();
?>
<?php endif; ?>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ticket.ticket.index')): ?>
    
    <div class="col-xl-6">
        <div class="card top-drivers-card p-0">
            <div class="card-header">
                <h3><?php echo e(__('ticket::static.widget.recent_tickets')); ?></h3>
                <a href="<?php echo e(route('admin.ticket.index')); ?>"><?php echo e(__('ticket::static.widget.view_all_tickets')); ?></a>
            </div>
            <div class="recent-rides-card pending-ticket custom-scrollbar">
                <?php if(count($tickets)): ?>
                    <table class="recent-rides-table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('ticket::static.widget.ticket_number')); ?></th>
                                <th><?php echo e(__('ticket::static.widget.created_by')); ?></th>
                                <th><?php echo e(__('ticket::static.widget.created_at')); ?></th>
                                <th><?php echo e(__('ticket::static.widget.priority')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><span class="id-wrapper">#<?php echo e($ticket->ticket_number ?? 'N/A'); ?></span></td>
                                    <td>
                                        <div class="driver-info">
                                            <?php if($ticket?->user): ?>
                                                <?php if($ticket?->user?->profile_image?->original_url): ?>
                                                    <img src="<?php echo e(asset('images/dashboard/4.png')); ?>" alt="">
                                                <?php else: ?>
                                                    <div class="user-initials">
                                                        <?php echo e(strtoupper(substr($ticket?->user?->name, 0, 1))); ?>

                                                    </div>
                                                <?php endif; ?>
                                                <div>
                                                    <h4><?php echo e($ticket->user?->name); ?></h4>
                                                    <span><?php echo e(isDemoModeEnabled() ? __('ticket::static.demo_mode') : $ticket->user->email); ?></span>
                                                </div>
                                            <?php else: ?>
                                                <div class="user-initials">
                                                    <?php echo e(strtoupper(substr($ticket?->name, 0, 1))); ?>

                                                </div>
                                                <div>
                                                    <h4><?php echo e($ticket->name); ?></h4>
                                                    <span><?php echo e(isDemoModeEnabled() ? __('ticket::static.demo_mode') : $ticket->email); ?></span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td><?php echo e($ticket?->created_at?->format('Y-m-d, h:i A')); ?></td>
                                    <td><?php echo e($ticket?->priority?->name); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                            <?php endif; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                <div class="table-no-data">
                    <img src="<?php echo e(asset('images/dashboard/data-not-found.svg')); ?>" class="img-fluid" alt="data not found">
                    <h6 class="text-center"><?php echo e(__('ticket::static.widget.no_data_available')); ?></h6>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /var/www/gocab/Modules/Ticket/resources/views/admin/widgets/recent-tickets.blade.php ENDPATH**/ ?>