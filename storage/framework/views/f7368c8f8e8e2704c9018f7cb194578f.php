<?php if($categoryParent->categoryChildrent->count()): ?>
    <ul role="menu" class="sub-menu">
        <?php $__currentLoopData = $categoryParent->categoryChildrent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a href="<?php echo e(route('category.product', ['slug' => $categoryChild->slug, 'id'=>$categoryChild->id])); ?>"><?php echo e($categoryChild->name); ?></a>
                
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>
<?php /**PATH D:\shop\resources\views/components/childMenu.blade.php ENDPATH**/ ?>