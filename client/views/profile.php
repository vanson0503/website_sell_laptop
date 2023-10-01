<?php

?>
<main class="main">

	<nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">

		</div><!-- End .container -->
	</nav><!-- End .breadcrumb-nav -->

	<div class="page-content">
		<div class="checkout">
			<div class="container">

				<form action="?controller=customers&action=update" method="post">
					<input type="hidden" value="<?php echo $customer["id"]; ?>" name="id">
					<div class="row" style="display : flex ;justify-content : center">
						<div class="col-lg-9 w-75" style="">
							<h2 class="checkout-title"
								style="text-align : center; font-size : 30px; font-weight : bold">Thông tin cá nhân</h2>
							<!-- End .checkout-title -->
							<div class="row">
								<div class="col-sm-6">
									<label>Tên</label>
									<input type="text" value="<?php echo $customer["name"]; ?>" name="name"
										class="form-control" required>
								</div><!-- End .col-sm-6 -->
							</div><!-- End .row -->
							<div class="row">
								<div class="col-sm-6">
									<label>Email</label>
									<input type="text" value="<?php echo $customer["email"]; ?>" name="email"
										class="form-control">
								</div><!-- End .col-sm-6 -->
								<div class="col-sm-6">
									<label>SĐT</label>
									<input type="text" value="<?php echo $customer["phone"]; ?>" name="phone"
										class="form-control" required>
								</div><!-- End .col-sm-6 -->
							</div><!-- End .row -->
							<label>Địa chỉ</label>
							<input type="text" value="<?php echo $customer["address"]; ?>" name="address"
								class="form-control" placeholder="Địa chỉ" required>
							<div class="text-center">
								<button class="btn btn-success" name="update">Cập nhật thông tin cá nhân</button>
							</div>
						</div><!-- End .col-lg-9 -->
					</div><!-- End .row -->
				</form>
				<form action="?controller=customers&action=updatepass" method="post">
					<input type="hidden" value="<?php echo $customer["id"]; ?>" name="id">
					<div class="row" style="display : flex ;justify-content : center">
						<div class="col-lg-3" style="">
							<h2 class="checkout-title"
								style="text-align : center; font-size : 30px; font-weight : bold">Cập nhật mật khẩu</h2>
							<!-- End .checkout-title -->
							<div class="row">
								<div class="col-sm-12">
									<label>Mật khẩu cũ</label>
									<input type="password" name="password" class="form-control" required>
								</div><!-- End .col-sm-6 -->
							</div><!-- End .row -->
							<div class="row">
								<div class="col-sm-12">
									<label>Mật khẩu mới</label>
									<input type="password" name="newpassword" class="form-control" required>
								</div><!-- End .col-sm-6 -->
							</div><!-- End .row -->
							<div class="row">
								<div class="col-sm-12">
									<label>Nhập lại mật khẩu mới</label>
									<input type="password" name="renewpassword" class="form-control" required>
								</div><!-- End .col-sm-6 -->
							</div><!-- End .row -->
							<div class="text-center">
								<?php
								if(isset($flag)){
									$color = "green";
								}
								else{
									$color = "red";
								}
								if (isset($message)) {
									echo "<p style='color:".$color.";'>".$message."</p>";
								}
								?>
							</div>
							<div class="text-center">
								<button class="btn btn-success" name="updatepass">Cập nhật</button>
							</div>
						</div><!-- End .col-lg-9 -->
					</div><!-- End .row -->
				</form>
			</div><!-- End .container -->
		</div><!-- End .checkout -->
	</div><!-- End .page-content -->
</main><!-- End .main -->