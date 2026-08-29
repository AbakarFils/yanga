<?php $__env->startSection('title', 'OTP Verification'); ?>
<?php $__env->startPush('css'); ?>
    <!-- aos css -->
    <link rel="preload" as="style" href="<?php echo e(asset('front/css/aos.css')); ?>" onload="this.onload=null;this.rel='stylesheet'">

    <!-- wow animate css link -->
    <link rel="stylesheet" href="<?php echo e(asset('front/css/vendors/wow.css')); ?>" media="print" onload="this.media='all'">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('front/css/vendors/wow-animate.css')); ?>" media="print"
        onload="this.media='all'">
    <link rel="stylesheet" href="https://public.codepenassets.com/css/normalize-5.0.0.min.css">
    
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <section class="authentication-section section-b-space">
        <div class="container">
            <div class="auth-form-box">
                <img src="<?php echo e(asset('images/authentication-img2.png')); ?>" class="img-fluid auth-image">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-6 mx-auto">
                        <div class="auth-right-box">
                            <h3><?php echo e(__('cabbooking::front.otp_verification')); ?></h3>
                            <h6><?php echo e(__('cabbooking::front.digit_code')); ?></h6>

                            <form method="POST" action="<?php echo e(route('front.cab.verify_otp.store')); ?>" id="otpForm">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="email_or_phone"
                                    value="<?php echo e(old('email_or_phone', session('email_or_phone'))); ?>">
                                <input type="hidden" name="country_code"
                                    value="<?php echo e(old('country_code', session('country_code'))); ?>">
                                <div class="form-box">
                                    <div class="otp-inputs" id="otp-inputs">
                                        <input type="text" class="form-control otp-field otp__field__1" maxlength="1"
                                            name="otp[]" pattern="[0-9]{1}" oninput="handleInput(1, event)"
                                            onkeydown="handleBackspace(1, event)" autofocus>
                                        <input type="text" class="form-control otp-field otp__field__2" maxlength="1"
                                            name="otp[]" pattern="[0-9]{1}" oninput="handleInput(2, event)"
                                            onkeydown="handleBackspace(2, event)" disabled>
                                        <input type="text" class="form-control otp-field otp__field__3" maxlength="1"
                                            name="otp[]" pattern="[0-9]{1}" oninput="handleInput(3, event)"
                                            onkeydown="handleBackspace(3, event)" disabled>
                                        <input type="text" class="form-control otp-field otp__field__4" maxlength="1"
                                            name="otp[]" pattern="[0-9]{1}" oninput="handleInput(4, event)"
                                            onkeydown="handleBackspace(4, event)" disabled>
                                        <input type="text" class="form-control otp-field otp__field__5" maxlength="1"
                                            name="otp[]" pattern="[0-9]{1}" oninput="handleInput(5, event)"
                                            onkeydown="handleBackspace(5, event)" disabled>
                                        <input type="text" class="form-control otp-field otp__field__6" maxlength="1"
                                            name="otp[]" pattern="[0-9]{1}" oninput="handleInput(6, event)"
                                            onkeydown="handleBackspace(6, event)" disabled>
                                    </div>
                                    <?php $__errorArgs = ['otp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <?php if(isDemoMode()): ?>
                                    <h6><?php echo e(__('cabbooking::front.demo_otp')); ?></h6>
                                <?php endif; ?>
                                <button type="submit" class="btn btn-primary otp-btn verifyBtn spinner-btn"
                                    disabled><?php echo e(__('cabbooking::front.verify')); ?></button>
                                <h6 class="new-account"><?php echo e(__('cabbooking::front.not_receive_otp')); ?> <a href="#"
                                        id="resend-otp"><?php echo e(__('cabbooking::front.resent_otp')); ?></a></h6>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <!-- WOW JS -->
    <script src="<?php echo e(asset('front/js/wow.js')); ?>"></script>
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                new WOW().init();
                $("#changePasswordForm").validate({
                    ignore: [],
                    rules: {
                        "current_password": "required",
                        "new_password": {
                            required: true,
                            minlength: 8
                        },
                        "confirm_password": {
                            required: true,
                            equalTo: "#new_password"
                        },
                    },
                });

                $("#updateProfileForm").validate({
                    ignore: [],
                    rules: {
                        "name": "required",
                        "email": "required",
                        "phone": "required"
                    },
                });
            });
        })(jQuery);
    </script>
    <script>
        const handleInput = (n, event) => {
            const curInput = document.querySelector(`.otp__field__${n}`);
            const nextInput = document.querySelector(`.otp__field__${n + 1}`);

            if (curInput.value.length > 1) {
                curInput.value = curInput.value.slice(0, 1);
            }

            if (curInput.value.length === 1 && nextInput) {
                nextInput.disabled = false;
                nextInput.focus();
            }

            const allInputs = document.querySelectorAll('.otp-field');
            const allInputsFilled = Array.from(allInputs).every(input => input.value.length === 1);
            const verifyButton = document.querySelector('.verifyBtn');
            verifyButton.disabled = !allInputsFilled;

            if (allInputsFilled) {
                allInputs[allInputs.length - 1].blur();
            }
        }

        const handleBackspace = (n, event) => {
            if (event.key === 'Backspace') {
                const curInput = document.querySelector(`.otp__field__${n}`);
                const prevInput = document.querySelector(`.otp__field__${n - 1}`);

                if (curInput.value.length === 0 && prevInput) {
                    prevInput.focus();
                }

                const allInputs = document.querySelectorAll('.otp-field');
                const allInputsFilled = Array.from(allInputs).every(input => input.value.length === 1);
                const verifyButton = document.querySelector('.verifyBtn');
                verifyButton.disabled = !allInputsFilled;
            }
        }

        (function($) {
            "use strict";
            $(document).ready(function() {
                $('#resend-otp').click(function(e) {
                    e.preventDefault();
                    const emailOrPhone = $('input[name="email_or_phone"]').val();
                    const countryCode = $('input[name="country_code"]').val();
                    $.ajax({
                        url: '<?php echo e(route('front.cab.login_with_credential')); ?>',
                        method: 'POST',
                        data: {
                            email_or_phone: emailOrPhone,
                            country_code: countryCode,
                            _token: '<?php echo e(csrf_token()); ?>'
                        },
                        success: function(response) {
                            if (response.success) {
                                toastr.success(
                                    "<?php echo e(__('cabbooking::front.otp_resent_successfully')); ?>"
                                );
                                $('.otp-field').val('').prop('disabled', true);
                                $('.otp__field__1').prop('disabled', false).focus();
                                $('.verifyBtn').prop('disabled', true);
                            } else {
                                toastr.error(response.message ||
                                    "<?php echo e(__('cabbooking::front.failed_resent_otp')); ?>");
                            }
                        },
                        error: function(xhr) {
                            toastr.error(xhr.responseJSON.message ||
                                "<?php echo e(__('cabbooking::front.failed_resent_otp')); ?>");
                        }
                    });
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('front.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/gocab/Modules/CabBooking/resources/views/front/auth/verify_otp.blade.php ENDPATH**/ ?>