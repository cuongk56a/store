

<?php $__env->startSection('title'); ?>
    <title>E-Shopper</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('home/home.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('auth.components.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section>
        <div class="container">
            <div class="row">
                <?php echo $__env->make('components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="col-sm-9 padding-right">
                    <!--features_items-->
                    <div class="features_items">
                        <h2 class="title text-center">Sản Phẩm Mới</h2>
                        <?php $__currentLoopData = $productFeature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productFeatureItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo e($productFeatureItem->feature_image_path); ?>"
                                                alt="<?php echo e($productFeatureItem->feature_image_name); ?>" />
                                            <h2><?php echo e(number_format($productFeatureItem->price)); ?> VNĐ</h2>
                                            <p><?php echo e($productFeatureItem->name); ?></p>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2><?php echo e(number_format($productFeatureItem->price)); ?></h2>
                                                <p><?php echo e($productFeatureItem->name); ?> VNĐ</p>
                                                <a  href="#" 
                                                    class="btn btn-default add-to-cart add_to_cart"
                                                    data-url="<?php echo e(route('cart.add', ['id'=>$productFeatureItem->id])); ?>"
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
                                                <a href="<?php echo e(route('products.show',['id'=>$productFeatureItem->id])); ?>" target="_blank">
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
                    <!--features_items-->

                    

                    <!--recommended_items-->
                    <div class="recommended_items">
                        <h2 class="title text-center">Đề Xuất</h2>
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php $__currentLoopData = $productRecommed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyRecommed => $productRecommedItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($keyRecommed % 3 == 0): ?>
                                <div class="item <?php echo e($keyRecommed == 0 ? 'active' : ''); ?>"> 
                                <?php endif; ?>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="<?php echo e($productRecommedItem->feature_image_path); ?>"
                                                    alt="<?php echo e($productRecommedItem->name); ?>" />
                                                    <h2><?php echo e(number_format($productRecommedItem->price)); ?> VNĐ</h2>
                                                    <p><?php echo e($productRecommedItem->name); ?></p>
                                                    <a href="#" 
                                                        class="btn btn-default add-to-cart add_to_cart"
                                                        data-url="<?php echo e(route('cart.add', ['id'=>$productRecommedItem->id])); ?>"
                                                    >
                                                        <i class="fa fa-shopping-cart"></i>
                                                        Add to cart
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="choose">
                                                <ul class="nav nav-pills nav-justified">
                                                    <li>
                                                        <a href="<?php echo e(route('products.show',['id'=>$productRecommedItem->id])); ?>" target="_blank">
                                                            <i class="fa fa-info-circle"></i>
                                                            Chi tiết sản phẩm
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php if( $keyRecommed % 3 == 2): ?>
                                </div>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                    </div>
                </div>
                <!--/recommended_items-->
            </div>
        </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('home/home.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop\resources\views/auth/home.blade.php ENDPATH**/ ?>