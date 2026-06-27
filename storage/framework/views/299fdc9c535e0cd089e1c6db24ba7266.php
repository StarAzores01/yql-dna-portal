<?php $__env->startSection('content'); ?>
<h1>Welcome, <?php echo e(auth()->user()->name); ?></h1>
<p class="muted">Role: <strong><?php echo e(ucfirst(auth()->user()->role)); ?></strong></p>

<div class="quick-cards">
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('documents.index', ['category_id' => $category->id])); ?>" class="quick-card">
            <h3><?php echo e($category->name); ?></h3>
            <span><?php echo e($category->documents_count); ?> document(s)</span>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<h2>Recently Uploaded Documents</h2>
<?php if($recentDocuments->isEmpty()): ?>
    <p class="muted">No documents available to your role yet.</p>
<?php else: ?>
    <table class="data-table">
        <thead>
            <tr><th>Title</th><th>Category</th><th>Uploaded</th><th></th></tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $recentDocuments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($doc->title); ?></td>
                <td><?php echo e($doc->category->name); ?></td>
                <td><?php echo e($doc->created_at->diffForHumans()); ?></td>
                <td><a href="<?php echo e(route('documents.download', $doc)); ?>">Download</a></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php endif; ?>

<div class="security-reminder">
    🔒 Reminder: This portal contains confidential company information. Do not share your login credentials or downloaded documents outside authorized personnel.
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Star Angel\Downloads\yql-dna-portal-laravel11\yql-dna-portal\resources\views/dashboard/index.blade.php ENDPATH**/ ?>