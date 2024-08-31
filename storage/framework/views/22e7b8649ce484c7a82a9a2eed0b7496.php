<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Danh mục sản phẩm</h2>
        <div class="panel-group category-products"><!--category-productsr-->
            <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <?php if($categoryItem->categoryChildrent->count()): ?> 
                            <a data-toggle="collapse" data-parent="#accordian" href="#<?php echo e($categoryItem->id); ?>">
                                <span class="badge pull-right">
                                    <i class="fa fa-plus"></i>
                                </span>
                                <?php echo e($categoryItem->name); ?>

                            </a>
                            <?php else: ?> 
                            <a href="<?php echo e(route('category.product', ['slug' => $categoryItem->slug, 'id'=>$categoryItem->id])); ?>">
                                <span class="badge pull-right"></span>
                                <?php echo e($categoryItem->name); ?>

                            </a>
                            <?php endif; ?>
                        </h4>
                    </div>   
                </div>
                <div id="<?php echo e($categoryItem->id); ?>" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <?php $__currentLoopData = $categoryItem->categoryChildrent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryChildrent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(route('category.product', ['slug' => $categoryChildrent->slug, 'id'=>$categoryChildrent->id])); ?>">
                                        <?php echo e($categoryChildrent->name); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </ul>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div><!--/category-products-->
    </div>
</div>
<?php /**PATH D:\shop\resources\views/components/sidebar.blade.php ENDPATH**/ ?>