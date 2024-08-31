

<?php $__env->startSection('title'); ?>
    <title>E-Shopper</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('home/home.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section id="form"><!--form-->
		<div class="container">
			<?php if(session('thongbao')): ?>
				<div class="alert alert-success" style="justify-content: center">
					<?php echo e(session('thongbao')); ?>

				</div>
			<?php endif; ?>
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
						<div class="login-form"><!--login form-->
							<h2>Đăng nhập</h2>
							<form action="<?php echo e(route('postLogin')); ?>" method="POST">
								<?php echo csrf_field(); ?>
								<div>
									<input type="email" placeholder="Email Address" name="email"/>
									<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
	                                    <span style="color: red"><?php echo e($message); ?></span>
	                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
								<div>
									<input type="password" placeholder="Mật khẩu" name="password"/>
									<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
	                                    <span style="color: red"><?php echo e($message); ?></span>
	                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
								<span>
									<input type="checkbox" class="checkbox" name="remember_me"> 
									Ghi nhớ đăng nhập
								</span>
								<button type="submit" class="btn btn-default">Đăng nhập</button>
							</form>
						</div><!--/login form-->
					</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Tạo tài khoản mới!</h2>
						<form action="<?php echo e(route('postRegister')); ?>" method="POST">
							<?php echo csrf_field(); ?>
							<input type="text" placeholder="Tên người dùng" name="name"/>
							<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        		<span style="color: red"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							<input type="email" placeholder="Email Address" name="email"/>
							<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        		<span style="color: red"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							<input type="password" placeholder="Mật khẩu" name="password"/>
							<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        		<span style="color: red"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							<button type="submit" class="btn btn-default">Đăng ký</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('home/home.js')); ?>"></script>
<?php $__env->stopSection(); ?>
	
	
	
	

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop\resources\views/auth/login.blade.php ENDPATH**/ ?>