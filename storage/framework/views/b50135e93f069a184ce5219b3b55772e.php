<?php $__env->startSection('content'); ?>
<div class="auth-card">
    <h1 class="auth-title">YQL DNA Portal</h1>
    <p class="auth-subtitle">Secure Login</p>

    <?php if($errors->any()): ?>
        <div class="alert alert-error">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('login.attempt')); ?>">
        <?php echo csrf_field(); ?>
        <label for="login">Employee ID or Email</label>
        <input type="text" id="login" name="login" value="<?php echo e(old('login')); ?>" required autofocus>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <label class="checkbox-row">
            <input type="checkbox" name="remember"> Remember me
        </label>

        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>

    <a href="#" class="forgot-link" title="Contact your administrator to reset your password">Forgot password?</a>

    <div class="security-badges">
        <span>🔒 Authorized Access Only</span>
        <span>📋 All Activity Logged</span>
        <span>🔐 Data Encrypted</span>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Star Angel\Downloads\yql-dna-portal-laravel11\yql-dna-portal\resources\views/auth/login.blade.php ENDPATH**/ ?>