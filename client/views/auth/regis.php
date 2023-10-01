<main class="main">

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab"
                                aria-controls="register-2" aria-selected="true">Đăng Ký</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active " id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="register-name">Họ và tên *</label>
                                    <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($_POST["btnregis"])){echo $_POST["name"];} ?>" name="name" required>
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <label for="register-email-2">Địa chỉ email *</label>
                                    <input type="email" class="form-control" id="email" value="<?php if(isset($_POST["btnregis"])){echo $_POST["email"];} ?>" name="email" required>
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <label for="register-email-2">Số điện thoại *</label>
                                    <input type="text" class="form-control" id="phone" value="<?php if(isset($_POST["btnregis"])){echo $_POST["phone"];} ?>" name="phone" required>
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <label for="register-password-2">Mật khẩu *</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <label for="register-password-2">Nhập lại mật khẩu *</label>
                                    <input type="password" class="form-control" id="repassword" name="repassword"
                                        required>
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <label for="register-name">Địa chỉ *</label>
                                    <input type="text" class="form-control" id="address" value="<?php if(isset($_POST["btnregis"])){echo $_POST["address"];} ?>" name="address" required>
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <?php
                                    if (isset($message)) {
                                        echo '<p class="text-center" style="color:red;">' . $message . '</p>';
                                    }
                                    ?>

                                </div><!-- End .form-group -->
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2" name="btnregis">
                                        <span>Đăng ký</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="register-policy-2"
                                            required>
                                        <label class="custom-control-label" for="register-policy-2">Đồng ý với <a
                                                href="#">điều khoản dịch vụ</a> *</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .form-footer -->
                                <div class="form-group text-center">
                                Đã có tài khoản?
                                    <a href="?controller=home&action=login" class="forgot-link">Đăng nhập</a>
                                </div><!-- End .form-group -->
                            </form>
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</main><!-- End .main -->