<main class="main">
	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
		<div class="container">
			<h1 class="page-title">Thanh toán<span>Shop</span></h1>
		</div><!-- End .container -->
	</div><!-- End .page-header -->

	<div class="page-content">
		<div class="checkout">
			<div class="container">
				
				<form action="?controller=carts&action=order" method="post">
					<div class="row">
						<div class="col-lg-7">
							<h2 class="checkout-title">Chi tiết thanh toán</h2><!-- End .checkout-title -->
							<div class="row">
								<div class="col-sm-6">
									<label>Họ tên *</label>
									<input type="text" name="name" class="form-control" value="<?php echo $customer["name"] ?>" required>
								</div><!-- End .col-sm-6 -->

								<div class="col-sm-6">
									<label>Số điện thoại *</label>
									<input type="text" name="phone" class="form-control" value="<?php echo $customer["phone"] ?>" required>
								</div><!-- End .col-sm-6 -->
							</div><!-- End .row -->
							<label>Email *</label>
							<input type="text" name="email" value="<?php echo $customer["email"] ?>" class="form-control" required>
							<label>Địa chỉ nhận hàng *</label>
							<input type="text" name="address" value="<?php echo $customer["address"] ?>" class="form-control" required>

							

							<label>Ghi chú</label>
							<textarea class="form-control" name="note" cols="30" rows="4"
								placeholder="Nhắn với Shop"></textarea>
						</div><!-- End .col-lg-9 -->
						<aside class="col-lg-5">
							<div class="summary">
								<h3 class="summary-title">Thông tin đặt hàng</h3><!-- End .summary-title -->

								<table class="table table-summary">
									<thead>
										<tr>
											<th>Sản phẩm</th>
											<th>Giá tiền</th>
											<th>Tổng số</th>
										</tr>
									</thead>

									<tbody>
										<?php
											$total = 0;
										?>
									<?php foreach ($carts as $cart): ?>
										<tr>
											<?php
												$product = Products::getProductById($cart["productid"]);
												$total +=$cart["quantity"]*$cart["price"];
											?>
											<td class="col-lg-8"><?php echo $product["product"]["name"]; ?></td>
											<td class="col-lg-2"><?php echo number_format($cart["price"], 0, "", "."); ?></td>
											<td class="col-lg-2"><?php echo $cart["quantity"]; ?></td>
										</tr>
									<?php endforeach ?>
										
										<tr class="summary-total">
											<td colspan="3"><span class="col-lg-2">Tổng tiền:</span>
											<span class="col-lg-10"><?php echo number_format($total, 0, "", "."); ?> VNĐ</span>
										</td>
											
											
										</tr><!-- End .summary-total -->
									</tbody>
								</table><!-- End .table table-summary -->

								<div class="accordion-summary" id="accordion-payment">
									

									<div class="card">
										<div class="card-header" id="heading-5">
											<h2 class="card-title">
												<input type="radio" name="payment" id="" value="Tiền mặt" checked> Tiền mặt
											</h2>
										</div><!-- End .card-header -->
									</div><!-- End .card -->
									<div class="card pt-1">
										<div class="card-header" id="heading-5">
											<h2 class="card-title">
												<input type="radio" name="payment" value="Chuyển khoản" id=""> Chuyển khoản
											</h2>
										</div><!-- End .card-header -->
									</div><!-- End .card -->
								</div><!-- End .accordion -->

								<button type="submit" name="order" class="btn btn-outline-primary-2 btn-order btn-block">
									<span class="btn-text">Đặt hàng</span>
									<span class="btn-hover-text">Tiến hành thanh toán</span>
								</button>
							</div><!-- End .summary -->
						</aside><!-- End .col-lg-3 -->
					</div><!-- End .row -->
				</form>
			</div><!-- End .container -->
		</div><!-- End .checkout -->
	</div><!-- End .page-content -->
</main><!-- End .main -->