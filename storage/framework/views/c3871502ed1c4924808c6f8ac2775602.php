<?php $__env->startSection('content'); ?>
<h1>Audit Logs</h1>

<table class="data-table">
    <thead>
        <tr><th>Date/Time</th><th>User</th><th>Action</th><th>Description</th><th>IP Address</th></tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($log->created_at->format('Y-m-d H:i:s')); ?></td>
            <td><?php echo e($log->user?->name ?? 'Unknown'); ?></td>
            <td><span class="badge"><?php echo e($log->action); ?></span></td>
            <td><?php echo e($log->description); ?></td>
            <td><?php echo e($log->ip_address); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php echo e($logs->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Star Angel\Downloads\yql-dna-portal-laravel11\yql-dna-portal\resources\views/audit-logs/index.blade.php ENDPATH**/ ?>