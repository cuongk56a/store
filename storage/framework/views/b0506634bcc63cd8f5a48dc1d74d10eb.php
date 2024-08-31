<div class="cart_wrapper">
    <?php
    $total=0;
    ?>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Sản phẩm</td>
                        <td class="description"></td>
                        <td class="price">Đơn giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Giá</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $total += $cartItem['quantity'] * $cartItem['price'];
                        ?>	
                    <tr>
                        <td class="cart_product">
                            <img style="width:110px; height:110px; object-fit: contain" src="<?php echo e($cartItem['image_path']); ?>" alt="<?php echo e($cartItem['name']); ?>">
                        </td>
                        <td class="cart_description">
                            <h4><a href="<?php echo e(route('products.show', [$cartItem['id']])); ?>"><?php echo e($cartItem['name']); ?></a></h4>
                        </td>
                        <td class="cart_price">
                            <p><?php echo e(number_format($cartItem['price'])); ?> VNĐ</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <input class="cart_quantity_input" type="number" name="quantity" value="<?php echo e($cartItem['quantity']); ?>" min="1" data-url="<?php echo e(route('cart.update')); ?>" data-id="<?php echo e($key); ?>">
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price"><?php echo e(number_format($cartItem['quantity'] * $cartItem['price'])); ?> VNĐ</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" style="background-color:red" href="" data-url="<?php echo e(route('cart.delete')); ?>" data-id="<?php echo e($key); ?>"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Mã giảm giá</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Phiếu quà tặng</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Tỉnh/Thành phố:</label>
                            <input type="text">
                        </li>
                        <li class="single_field">
                            <label>Quận/Huyện:</label>
                            <input type="text">
                        </li>
                        <li class="single_field">
                            <label>Phường/Xã:</label>
                            <input type="text">
                        </li>
                    </ul>
                </div>
                <div class="total_area">
                    <ul>
                        <li>Tổng tiền <span><?php echo e(number_format($total)); ?> VNĐ</span></li>
                        <li>Thuế(5%) <span><?php echo e(number_format($total/20)); ?> VNĐ</span></li>
                        <li>Phí vận chuyển <span>Miễn phí</span></li>
                        <li>Thành tiền <span><?php echo e(number_format($total + $total/20)); ?> VNĐ</span></li>
                    </ul>
                        <a class="btn btn-default check_out pull-right" href="">Đặt hàng</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
</div><?php /**PATH D:\shop\resources\views/auth/components/cartContent.blade.php ENDPATH**/ ?>