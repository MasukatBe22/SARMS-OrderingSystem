<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"> 
                    <h1 class="m-0 text-dark">Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('chef.dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0">Two Factor Authentication</h5>
                </div>
                <div class="card-body">
                    <?php if(! auth()->user()->two_factor_secret): ?>
                        Activate two factor authentication ?
                        <form method="POST" action="<?php echo e(url('user/two-factor-authentication')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-primary mt-3">
                                Enable
                            </button>
                        </form>
                    <?php else: ?>
                        Deactivate  two factor authentication ?
                        <form method="POST" action="<?php echo e(url('user/two-factor-authentication')); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger mt-3">
                                Disable
                            </button>
                        </form>
                    <?php endif; ?>
 
                    <?php if(session('status') == 'two-factor-authentication-enabled'): ?>
                        <p class="mt-5">You have activate two factor authentication, please scan the following QR code into your phone authenticator application like Google Authenticator or Duo:</p>
                            <?php echo auth()->user()->twoFactorQrCodeSvg(); ?>


                        <p class="mt-5">Please store these recovery code in a secure location</p>
                        <?php $__currentLoopData = json_decode(decrypt(auth()->user()->two_factor_recovery_codes, true)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e(trim($code)); ?> <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0">Change Password</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="changePassword" class="form-horizontal">
                        <div class="form-group row">
                            <label for="currentPassword" class="col-sm-3 col-form-label">Current Password</label>
                            <div class="col-sm-9">
                                <input wire:model.defer="state.current_password" type="password" class="form-control <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="currentPassword" placeholder="Current Password">
                                <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="newPassword" class="col-sm-3 col-form-label">New Password</label>
                            <div class="col-sm-9">
                                <input wire:model.defer="state.password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="newPassword" placeholder="New Password">
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="passwordConfirmation" class="col-sm-3 col-form-label">Confirm New Password</label>
                            <div class="col-sm-9">
                                <input wire:model.defer="state.password_confirmation" type="password" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="passwordConfirmation" placeholder="Confirm New Password">
                                <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save mr-1"></i> Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\masuk\SAROS\resources\views/livewire/chef/settings/chef-settings.blade.php ENDPATH**/ ?>