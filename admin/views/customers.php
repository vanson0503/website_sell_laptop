<div class="mb-4">
    <div class="mb-4">
        <h2>Quản lý khách hàng</h2>
    </div>
    <?php if (isset($messageDelete)): ?>
        <script>
            alert("<?php echo $messageDelete; ?>")
        </script>
    <?php endif ?>
    <?php if (isset($messageUpdate)): ?>
        <script>
            alert("<?php echo $messageUpdate; ?>")
        </script>
    <?php endif ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Email</th>
                <th>SĐT</th>
                <th>Địa chỉ</th>
                <th>Tình trạng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td>
                        <?php echo $customer["name"] ?>
                    </td>
                    <td>
                        <?php echo $customer["email"] ?>
                    </td>
                    <td>
                        <?php echo $customer["phone"] ?>
                    </td>
                    <td>
                        <?php echo $customer["address"] ?>
                    </td>
                    <td class="flex">
                        <!-- <form action="" method="post">
                            <input type="hidden" name="id" value="<?php $customer["id"]; ?>">
                            <a class="btn btn-primary edit-button" data-bs-toggle="modal"
                                data-bs-target="#customer<?php $customer["id"]; ?>" data-id="">Sửa</a>
                            <button class="btn btn-danger delete-button" name="delete"
                                onclick="return confirmDelete()">Xóa</button>
                        </form> -->
                        <div class="form-group">
                            <?php
                            $activeUrl = "?controller=customers&action=changestatus&id=" . $customer["id"] . "&value=0";
                            $inactiveUrl = "?controller=customers&action=changestatus&id=" . $customer["id"] . "&value=1";
                            ?>
                            <select class="form-control" onchange="navigate(this)">
                                <option value="<?php echo $activeUrl; ?>" <?php if (Customers::getStatus($customer["id"]) == 0)
                                       echo "selected"; ?>>
                                    Đang hoạt động
                                </option>
                                <option value="<?php echo $inactiveUrl; ?>" <?php if (Customers::getStatus($customer["id"]) == 1)
                                       echo "selected"; ?>>
                                    Vô hiệu hóa
                                </option>
                            </select>
                        </div>

                    </td>
                </tr>
                <!-- Popup sửa danh mục -->
                <div class="modal fade" id="customer<?php echo $customer["id"]; ?>" tabindex="-1" role="dialog"
                    aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Sửa khách hàng</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $customer["id"]; ?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="editName">Tên:</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="<?php echo $customer["name"] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editName">Email:</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="<?php echo $customer["email"] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editName">SĐT:</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="<?php echo $customer["phone"] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editName">Địa chỉ:</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="<?php echo $customer["address"] ?>" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" data-bs-dismiss="modal" name="update"
                                        class="btn btn-primary">Lưu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </tbody>
    </table>



</div>






<script>
    function confirmDelete() {
        return confirm("Bạn có chắc chắn muốn xóa?");
    }

</script>

<script>
    function navigate(selectElement) {
        var url = selectElement.value;
        window.location.href = url;
    }
</script>