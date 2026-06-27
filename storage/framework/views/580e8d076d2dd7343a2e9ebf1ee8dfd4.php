<?php $__env->startSection('content'); ?>
<h1>Manage Users</h1>
<a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary">Create User</a>

<table class="data-table">
    <thead>
        <tr><th>Name</th><th>Employee ID</th><th>Email</th><th>Role</th><th>Status</th><th>Last Login</th><th>Actions</th></tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($user->name); ?></td>
            <td><?php echo e($user->employee_id); ?></td>
            <td><?php echo e($user->email); ?></td>
            <td><?php echo e(ucfirst($user->role)); ?></td>
            <td><?php echo e(ucfirst($user->status)); ?></td>
            <td><?php echo e($user->last_login_at?->diffForHumans() ?? 'Never'); ?></td>
            <td>
                <a href="<?php echo e(route('users.edit', $user)); ?>">Edit</a>
                | <form method="POST" action="<?php echo e(route('users.reset-password', $user)); ?>" style="display:inline" onsubmit="return confirm('Reset password for this user?')">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn-link">Reset Password</button>
                </form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php echo e($users->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Star Angel\Downloads\yql-dna-portal-laravel11\yql-dna-portal\resources\views/users/index.blade.php ENDPATH**/ ?>