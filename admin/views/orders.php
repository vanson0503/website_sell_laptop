<div class="container">
    <h1 class="text-center h1">Thông tin hóa đơn đã đặt</h1>
    <table class="table text-center">
        <thead class="thead-dark ">
            <tr>
                <th scope="col">Mã hóa đơn</th>
                <th scope="col">Tên người nhận</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Ngày đặt</th>
                <th scope="col">Trạng thái</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <!-- Dòng này sẽ được lặp để hiển thị thông tin từ danh sách hóa đơn -->
            <?php foreach ($orders as $order): ?>
                <?php
                $orderdetail = Orders::selectOrderDetailById($order["orderid"]);
                $total = 0;
                $orderInfors = Orders::selectOrderByOrderDetailId($order["orderid"]);
                foreach ($orderInfors as $orderInfor) {
                    $product = Products::getProductById($orderInfor["productid"]);
                    $total += $orderInfor["quantity"] * $product["product"]["price"];
                    $customerid = $orderInfor["customerid"];
                }

                ?>
                <tr>
                    <td>
                        <?php echo $orderdetail["id"]; ?>
                    </td>
                    <td>
                        <?php echo $orderdetail["name"]; ?>
                    </td>
                    <td>
                        <?php echo number_format($total, 0, "", "."); ?> VNĐ
                    </td>
                    <td>
                        <?php
                        echo date('d/m/Y', strtotime($orderdetail["created_at"]));
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($orderdetail["status"] == 0) {
                            echo "Chờ xử lý";
                        } else if ($orderdetail["status"] == 1) {
                            echo "Đã xác nhận";
                        } else if ($orderdetail["status"] == 2) {
                            echo "Chuẩn bị hàng";
                        } else if ($orderdetail["status"] == 3) {
                            echo "Đang gửi hàng";
                        } else if ($orderdetail["status"] == 4) {
                            echo "Đã nhận hàng";
                        }
                        ?>
                    </td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $orderdetail["id"]; ?>">
                            <?php
                            if ($orderdetail["status"] == 0) {
                                echo '<button type="submit" name="xacnhan" 
                            class="btn btn-primary disable">Xác nhận đơn</button>';
                            } else if ($orderdetail["status"] == 1) {
                                echo '<button type="submit" name="chuanbi" 
                            class="btn btn-info">Chuẩn bị đơn</button>';
                            } else if ($orderdetail["status"] == 2) {
                                echo '<button type="submit" name="guihang" 
                            class="btn btn-warning">Gửi hàng</button>';
                            } else if ($orderdetail["status"] == 4 || $orderdetail["status"] == 3) {
                                echo '<button type="submit" name="" 
                            class="btn btn-danger disabled">Hoàn thành</button>';
                            }
                            ?>
                        </form>
                    </td>
                    <td>
                        <a href="#" class="btn btn-outline-primary btn-rounded" data-bs-toggle="modal"
                            data-bs-target="#orderdetail<?php echo $orderdetail["id"]; ?>">Xem chi tiết</a>
                    </td>
                    <td>
                        <a href="?controller=orders&action=print&id=<?php echo $orderdetail["id"]; ?>" class="btn btn-outline-info btn-rounded" target="_blank">In hóa đơn</a>
                    </td>
                </tr>
                <!-- The Modal -->
                <div class="modal" id="orderdetail<?php echo $orderdetail["id"]; ?>">
                    <div class="modal-dialog  modal-xl">
                        <div class="modal-content p-3">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Chi tiết hóa đơn</h4>
                                <a type="button" class="icon-close" data-bs-dismiss="modal"></a>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body p-5">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <b>Mã khách hàng: </b>
                                    </div>
                                    <div class="col-lg-3">
                                        <?php echo $customerid; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 b">
                                        <b>Tên người nhận: </b>
                                    </div>
                                    <div class="col-lg-3">
                                        <?php echo $orderdetail["name"]; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <b>Email: </b>
                                    </div>
                                    <div class="col-lg-3">
                                        <?php echo $orderdetail["email"]; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <b>Địa chỉ nhận hàng: </b>
                                    </div>
                                    <div class="col-lg-3">
                                        <?php echo $orderdetail["address"]; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <b>Ghi chú: </b>
                                    </div>
                                    <div class="col-lg-3">
                                        <?php echo $orderdetail["note"]; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <b>Hình thức thanh toán: </b>
                                    </div>
                                    <div class="col-lg-3">
                                        <?php echo $orderdetail["payment"]; ?>
                                    </div>
                                </div>
                                <div class="row p-3">
                                </div>
                                <?php
                                $productIds = Orders::getProductIdByOrderDetailId($orderdetail["id"]);
                                ?>
                                <div class="row">
                                    <div class="col-lg-8 b">
                                        <b>Sản phẩm</b>
                                    </div>
                                    <div class="col-lg-2">
                                        <b>Giá tiền</b>
                                    </div>
                                    <div class="col-lg-2">
                                        <b>Số lượng</b>
                                    </div>
                                </div>
                                <?php foreach ($productIds as $prod): ?>
                                    <?php
                                    $producttt = Products::getProductById($prod["productid"])
                                        ?>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <?php
                                            ?>
                                            <img src="../uploads/<?php echo $producttt["images"][0]; ?>" width="100" alt="">
                                            <?php echo $producttt["product"]["name"] ?>
                                        </div>
                                        <div class="col-lg-2">
                                            <?php echo number_format($producttt['product']['price'], 0, "", "."); ?> VNĐ
                                        </div>
                                        <div class="col-lg-2">
                                            <?php $quantity = Orders::getQuantityByOrderAndProduct($orderdetail["id"], $producttt["product"]["id"]); ?>
                                            <?php echo $quantity["quantity"]; ?>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                            <!-- Modal body -->
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>


