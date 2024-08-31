

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
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="<?php echo e($product->feature_image_path); ?>" alt="<?php echo e($product->name); ?>" />
                                <h3>ZOOM</h3>
                            </div>
                            
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="<?php echo e(asset('eshopper/images/product-details/new.jpg')); ?>" class="newarrival" alt="<?php echo e($product->name); ?>" />
                                <h2><?php echo e($product->name); ?></h2>
                                <p>Web ID: 1089772</p>
                                <img src="<?php echo e(asset('eshopper/images/product-details/rating.png')); ?>" alt="<?php echo e($product->name); ?>" />
                                <span>
                                    <span><?php echo e(number_format($product->price)); ?></span>
                                    <label>Quantity:</label>
                                    <input type="text" class="input_quantity" value="1" />
                                    <button type="button" class="btn btn-fefault cart add_cart" data-url="<?php echo e(route('cart.add', ['id'=>$product->id])); ?>">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                </span>
                                <p><b>Loại:</b> <?php echo e($product->category->name); ?></p>
                                <p><b>Brand:</b> E-SHOPPER</p>
                                <a href=""><img src="<?php echo e(asset('eshopper/images/product-details/share.png')); ?>" class="share img-responsive"
                                    alt="" />
                                </a>
                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->
                    <div class="category-tab shop-details-tab"><!--category-tab-->
                        <div class="tab-content">
                            <div class="tab-pane fade active in">
                                
                            </div>

                        </div>
                    </div><!--/category-tab-->

                    <div class="recommended_items">
                        <h2 class="title text-center">recommended items</h2>
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
                                                        <i class="fa fa-shopping-cart">
                                                        </i>
                                                        Add to cart
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="choose">
                                                <ul class="nav nav-pills nav-justified">
                                                    <li>
                                                        <a href="<?php echo e(route('products.show',['id'=>$productRecommedItem->id])); ?>">
                                                            <i class="fa fa-info-circle"></i>
                                                            Chi tiết sản phẩm
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($keyRecommed % 3 == 2): ?>
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
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('home/home.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop\resources\views/auth/product/detail.blade.php ENDPATH**/ ?>