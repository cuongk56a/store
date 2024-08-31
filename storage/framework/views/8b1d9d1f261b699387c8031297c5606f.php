<?php if($categoryParent->categoryChildrent->count()): ?>
    <ul role="menu" class="sub-menu">
        <?php $__currentLoopData = $categoryParent->categoryChildrent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a href="shop.html"><?php echo e($categoryChild->name); ?></a>
                <?php echo $__env->make('auth.components.childMenu',['categoryParent' => $categoryChild], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>
<?php /**PATH D:\shop\resources\views/auth/components/childMenu.blade.php ENDPATH**/ ?>