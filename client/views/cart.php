<?php
require_once "client/models/Products.php";
if (isset($message)) {
	echo '<script>
			alert("'.$message.'");
		</script>';
		header("Refresh: 0; ?controller=carts");
}
?>


<main class="main">
	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
		<div class="container">
			<h1 class="page-title">Giỏ hàng<span>Shop</span></h1>
		</div><!-- End .container -->
	</div><!-- End .page-header -->

	<div class="page-content">
		<div class="cart">
			<div class="container">
				<div class="row">
					<div class="col-lg-9">
						<table class="table table-cart table-mobile">
							<thead >
								<tr class="row">
									<th class="col-lg-5">Sản phẩm</th>
									<th class="col-lg-2">Giá</th>
									<th class="col-lg-2">Số lượng</th>
									<th class="col-lg-2">Tổng tiền</th>
									<th class="col-lg-1"></th>
								</tr>
							</thead>


							<tbody >
								<?php
								$total = 0;
								?>

								<?php if (!isset($_SESSION["customerid"])): ?>
									<?php if (isset($_SESSION["cart"])): ?>
										<?php foreach ($_SESSION["cart"] as $productid => $cart): ?>
											<?php
											$product = Products::getProductById($productid);
											$total += $cart["quantity"] * $cart['price'];
											?>
											<tr class="row">
												<td class="product-col col-lg-5">
													<div class="product">
														<figure class="product-media">
															<a href="#">
																<img src="uploads/<?php echo $product["images"][0] ?>"
																	alt="Product image">
															</a>
														</figure>
														<h3 class="product-title">
															<a
																href="?controller=products&action=deltail&id=<?php echo $product["product"]["id"]; ?>"><?php echo $product["product"]["name"] ?></a>
														</h3><!-- End .product-title -->
													</div><!-- End .product -->
												</td>
												<td class="price-col col-lg-2">
													<?php echo number_format($cart['price'], 0, "", "."); ?> VNĐ
												</td>
												<td class="quantity-col col-lg-2">
													<form action="?controller=carts" method="post" class="cart-product-quantity">
														<input type="hidden" name="id"
															value="<?php echo $product['product']['id']; ?>">
														<input type="number" name="quantity" class="form-control"
															value="<?php echo $cart["quantity"] ?>" min="1" max="100" step="1"
															data-decimals="0" required>
														<input type="submit" class="form-control" name="update" value="Cập nhật">
													</form><!-- End .cart-product-quantity -->
												</td>
												<td class="total-col col-lg-2">
													<?php echo number_format($cart["quantity"] * $cart['price'], 0, "", "."); ?>
													VNĐ
												</td>
												<td class="remove-col col-lg-1"><a
														href="?controller=carts&deleteid=<?php echo $product["product"]["id"] ?>"
														class="btn-remove"><i class="icon-close"></i></a></td>
											</tr>
										<?php endforeach ?>
									<?php endif ?>
								<?php endif ?>


								<?php if (isset($_SESSION["customerid"])): ?>
									<?php foreach ($carts as $cart): ?>
										<?php
										$product = Products::getProductById($cart["productid"]);
										$total += $cart["quantity"] * $cart['price'];
										?>
										<tr class="row">
											<td class="product-col col-lg-5">
												<div class="product">
													<figure class="product-media">
														<a href="#">
															<img src="uploads/<?php echo $product["images"][0] ?>"
																alt="Product image">
														</a>
													</figure>

													<h3 class="product-title">
														<a
															href="?controller=products&action=deltail&id=<?php echo $product["product"]["id"]; ?>"><?php echo $product["product"]["name"] ?></a>
													</h3><!-- End .product-title -->
												</div><!-- End .product -->
											</td>
											<td class="price-col col-lg-2">
												<?php echo number_format($cart['price'], 0, "", "."); ?> VNĐ
											</td>
											<td class="quantity-col col-lg-2">
												<form action="?controller=carts" method="post" class="cart-product-quantity">
													<input type="hidden" name="id"
														value="<?php echo $product['product']['id']; ?>">
													<input type="number" name="quantity" class="form-control"
														value="<?php echo $cart["quantity"] ?>" min="1" max="100" step="1"
														data-decimals="0" required>
													<input type="submit" class="form-control" name="update" value="Cập nhật">
												</form><!-- End .cart-product-quantity -->
											</td>
											<td class="total-col col-lg-2">
												<?php echo number_format($cart["quantity"] * $cart['price'], 0, "", "."); ?>
												VNĐ
											</td>
											<td class="remove-col col-lg-1">
												<?php if (isset($_GET['deleteid'])): ?>
													<a href="?controller=carts&action=index" class="btn-remove">
														<i class="icon-close"></i>
													</a>
												<?php else: ?>
													<a href="?controller=carts&action=index&deleteid=<?php echo $cart["id"] ?>"
														class="btn-remove">
														<i class="icon-close"></i>
													</a>
												<?php endif; ?>
											</td>
										</tr>
									<?php endforeach ?>
								<?php endif ?>



							</tbody>
						</table><!-- End .table table-wishlist -->
					</div><!-- End .col-lg-9 -->
					<aside class="col-lg-3">
						<div class="summary summary-cart">
							<h3 class="summary-title">Tổng tiền</h3><!-- End .summary-title -->

							<table class="table table-summary">
								<tbody>
									<tr class="summary-total">
										<td class="col-lg-3">Total:</td>
										<td class="col-lg-9">
											<?php echo number_format($total, 0, "", "."); ?> VNĐ
										</td>
									</tr><!-- End .summary-subtotal -->
								</tbody>
							</table><!-- End .table table-summary -->

							<?php
							if (isset($_SESSION["customerid"])) {
								echo '<a href="?controller=carts&action=process" class="btn btn-outline-primary-2 btn-order btn-block">Tiến hành thanh toán</a>';
							} else {
								echo '<a href="?controller=home&action=login" class="btn btn-outline-primary-2 btn-order btn-block">Đăng nhập để mua hàng</a>';
							}
							?>
						</div><!-- End .summary -->

						<a href="?controller=products" class="btn btn-outline-dark-2 btn-block mb-3"><span>Tiếp tục mua
								sắm</span><i class="icon-refresh"></i></a>
					</aside><!-- End .col-lg-3 -->
				</div><!-- End .row -->
			</div><!-- End .container -->
		</div><!-- End .cart -->
	</div><!-- End .page-content -->
</main><!-- End .main -->