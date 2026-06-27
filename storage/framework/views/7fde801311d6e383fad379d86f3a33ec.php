<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'YQL DNA Portal'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>
<body class="guest-body">
    <main class="guest-container">
        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <footer class="footer">
        <small>YQL DNA Portal &mdash; Yellowquip Zambia LTD &mdash; Authorized Access Only. All Activity Logged. Data Encrypted.</small>
    </footer>
</body>
</html>
<?php /**PATH C:\Users\Star Angel\Downloads\yql-dna-portal-laravel11\yql-dna-portal\resources\views/layouts/guest.blade.php ENDPATH**/ ?>