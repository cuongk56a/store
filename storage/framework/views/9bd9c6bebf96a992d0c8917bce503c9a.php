

<?php $__env->startSection('title'); ?>
    <title>E-Shopper</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('home/home.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section>
        <div class="container">
            <div class="row">
                <?php echo $__env->make('components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="col-sm-9 padding-right">
                    <!--features_items-->
                    <div class="features_items">
                        <h2 class="title text-center">Sản Phẩm</h2>
                        <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo e($item->feature_image_path); ?>"
                                                alt="<?php echo e($item->feature_image_name); ?>" />
                                            <h2><?php echo e(number_format($item->price)); ?> VNĐ</h2>
                                            <p><?php echo e($item->name); ?></p>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2><?php echo e(number_format($item->price)); ?></h2>
                                                <p><?php echo e($item->name); ?> VNĐ</p>
                                                <a  href="#" 
                                                    class="btn btn-default add-to-cart add_to_cart"
                                                    data-url="<?php echo e(route('cart.add', ['id'=>$item->id])); ?>"
                                                >
                                                        <i class="fa fa-shopping-cart"></i>
                                                        Add to cart
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li>
                                                <a href="<?php echo e(route('products.show',['id'=>$item->id])); ?>" target="_blank">
                                                    <i class="fa fa-info-circle"></i>
                                                    Chi tiết sản phẩm
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('home/home.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop\resources\views/auth/product/searchProduct.blade.php ENDPATH**/ ?>