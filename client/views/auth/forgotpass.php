<?php if(isset($message)):?>
    <script>
        alert("<?php echo $message; ?>")
    </script>
<?php endif ?>
<main class="main">
    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab"
                                aria-controls="signin-2" aria-selected="false">Quên mật khẩu</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>

                                
                                <div class="form-group">

                                </div><!-- End .form-group -->


                                <div class="form-footer">
                                    <button type="submit" name="btnforgot" class="btn btn-outline-primary-2">
                                        <span>Khôi phục mật khẩu</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </div><!-- End .form-group -->
                                <div class="form-group">
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