<?php $__env->startSection('content'); ?>
<h1>Upload Document</h1>

<form method="POST" action="<?php echo e(route('documents.store')); ?>" enctype="multipart/form-data" class="form-card">
    <?php echo csrf_field(); ?>

    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="<?php echo e(old('title')); ?>" required>

    <label for="description">Description</label>
    <textarea id="description" name="description" rows="3"><?php echo e(old('description')); ?></textarea>

    <label for="category_id">Category</label>
    <select id="category_id" name="category_id" required>
        <option value="">Select category</option>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($category->id); ?>" <?php if(old('category_id') == $category->id): echo 'selected'; endif; ?>><?php echo e($category->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <label for="access_level">Access Level</label>
    <select id="access_level" name="access_level" required>
        <?php $__currentLoopData = ['all','staff','manager','auditor','admin']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($level); ?>"><?php echo e(ucfirst($level)); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <label for="status">Status</label>
    <select id="status" name="status" required>
        <option value="active">Active</option>
        <option value="archived">Archived</option>
    </select>

    <label for="file">File (pdf, doc, docx, xls, xlsx, ppt, pptx, jpg, png &mdash; max 10MB)</label>
    <input type="file" id="file" name="file" required>

    <button type="submit" class="btn btn-primary">Upload</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Star Angel\Downloads\yql-dna-portal-laravel11\yql-dna-portal\resources\views/documents/create.blade.php ENDPATH**/ ?>