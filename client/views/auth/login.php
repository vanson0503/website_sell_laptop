

<main class="main">

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab"
                                aria-controls="signin-2" aria-selected="false">Đăng Nhập</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="singin-email-2">Địa chỉ email *</label>
                                    <input type="text" class="form-control" id="email" name="email" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="singin-password-2">Mật khẩu *</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <?php
                                    if (isset($message)) {
                                        echo '<p class="text-center" style="color:red;">' . $message . '</p>';
                                    }
                                    ?>

                                </div><!-- End .form-group -->


                                <div class="form-footer">
                                    <button type="submit" name="btnlogin" class="btn btn-outline-primary-2">
                                        <span>Đăng nhập</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>



                                    <a href="?controller=home&action=forgotpass" class="forgot-link">Quên mật khẩu?</a>
                                </div><!-- End .form-footer -->
                                <div class="form-group text-center">
                                Chưa có tài khoản?
                                    <a href="?controller=home&action=regis" class="forgot-link">Đăng ký</a>
                                </div><!-- End .form-group -->
                            </form>
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</main><!-- End .main -->