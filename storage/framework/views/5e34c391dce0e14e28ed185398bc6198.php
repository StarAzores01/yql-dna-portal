<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'YQL DNA Portal'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>
<body>
    <header class="topbar">
        <div class="topbar-inner">
            <a href="<?php echo e(route('dashboard')); ?>" class="brand">YQL <span>DNA Portal</span></a>
            <?php if(auth()->guard()->check()): ?>
            <nav class="nav-links">
                <a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                <a href="<?php echo e(route('documents.index')); ?>">Documents</a>
                <?php if(auth()->user()->role === 'admin'): ?>
                    <a href="<?php echo e(route('documents.create')); ?>">Upload</a>
                    <a href="<?php echo e(route('users.index')); ?>">Users</a>
                <?php endif; ?>
                <?php if(in_array(auth()->user()->role, ['admin', 'auditor'])): ?>
                    <a href="<?php echo e(route('audit-logs.index')); ?>">Audit Logs</a>
                <?php endif; ?>
            </nav>
            <form method="POST" action="<?php echo e(route('logout')); ?>" class="logout-form">
                <?php echo csrf_field(); ?>
                <span class="user-chip"><?php echo e(auth()->user()->name); ?> (<?php echo e(auth()->user()->role); ?>)</span>
                <button type="submit">Logout</button>
            </form>
            <?php endif; ?>
        </div>
    </header>

    <main class="page-container">
        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="alert alert-error">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer class="footer">
        <small>YQL DNA Portal &mdash; Yellowquip Zambia LTD &mdash; Authorized Access Only. All Activity Logged. Data Encrypted.</small>
    </footer>
</body>
</html>
<?php /**PATH C:\Users\Star Angel\Downloads\yql-dna-portal-laravel11\yql-dna-portal\resources\views/layouts/app.blade.php ENDPATH**/ ?>