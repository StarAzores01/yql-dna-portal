<?php $__env->startSection('content'); ?>
<h1>Documents</h1>

<form method="GET" action="<?php echo e(route('documents.index')); ?>" class="filter-bar">
    <input type="text" name="search" placeholder="Search documents..." value="<?php echo e(request('search')); ?>">
    <select name="category_id">
        <option value="">All Categories</option>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($category->id); ?>" <?php if(request('category_id') == $category->id): echo 'selected'; endif; ?>><?php echo e($category->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php if(auth()->user()->role === 'admin'): ?>
        <select name="access_level">
            <option value="">All Access Levels</option>
            <?php $__currentLoopData = ['all','staff','manager','auditor','admin']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($level); ?>" <?php if(request('access_level') == $level): echo 'selected'; endif; ?>><?php echo e(ucfirst($level)); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    <?php endif; ?>
    <button type="submit" class="btn btn-secondary">Filter</button>
</form>

<?php if(auth()->user()->role === 'admin'): ?>
    <a href="<?php echo e(route('documents.create')); ?>" class="btn btn-primary">Upload Document</a>
<?php endif; ?>

<table class="data-table">
    <thead>
        <tr>
            <th>Title</th><th>Category</th><th>Access Level</th><th>Size</th><th>Status</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($doc->title); ?><br><small class="muted"><?php echo e($doc->description); ?></small></td>
            <td><?php echo e($doc->category->name); ?></td>
            <td><span class="badge"><?php echo e(ucfirst($doc->access_level)); ?></span></td>
            <td><?php echo e($doc->humanFileSize()); ?></td>
            <td><?php echo e(ucfirst($doc->status)); ?></td>
            <td>
                <a href="<?php echo e(route('documents.download', $doc)); ?>">Download</a>
                <?php if(auth()->user()->role === 'admin'): ?>
                    | <form method="POST" action="<?php echo e(route('documents.archive', $doc)); ?>" style="display:inline">
                        <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                        <button type="submit" class="btn-link">Archive</button>
                    </form>
                    | <form method="POST" action="<?php echo e(route('documents.destroy', $doc)); ?>" style="display:inline" onsubmit="return confirm('Delete this document permanently?')">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn-link btn-link-danger">Delete</button>
                    </form>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php echo e($documents->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Star Angel\Downloads\yql-dna-portal-laravel11\yql-dna-portal\resources\views/documents/index.blade.php ENDPATH**/ ?>