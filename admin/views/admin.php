<div class="mb-4">
    <div class="mb-4">
        <h2>Quản lý tài khoản admin</h2>
    </div>
    <form action="" method="post">
        <input type="hidden" name="id" value="">
        <a class="btn btn-primary edit-button" data-bs-toggle="modal" data-bs-target="#CreateAccount" data-id="">Tạo tài
            khoản</a>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tài khoản</th>
                <th>Mật khẩu</th>
                <th>Chức vụ</th>
            </tr>
        </thead>
        <tbody>
            <?php if(isset($addMessage)) :?>
                <script>
                    alert("<?php echo $addMessage;?>");
                </script>
            <?php endif ?>
            <?php if(isset($deleteMessage)) :?>
                <script>
                    alert("<?php echo $deleteMessage;?>");
                </script>
            <?php endif ?>
            <?php if(isset($updateRoleMessage)) :?>
                <script>
                    alert("<?php echo $updateRoleMessage;?>");
                </script>
            <?php endif ?>
            <?php if(isset($updatePassMessage)) :?>
                <script>
                    alert("<?php echo $updatePassMessage;?>");
                </script>
            <?php endif ?>

            <?php foreach ($admins as $admin): ?>
                <tr>
                    <td>
                        <?php echo $admin["id"]; ?>
                    </td>
                    <td>
                        <?php echo $admin["username"]; ?>
                    </td>
                    <td>
                        **********
                    </td>
                    <td>
                        <?php
                        if ($admin["role"] == 1) {
                            echo "Admin";
                        } else {
                            echo "Quản lý";
                        }

                        ?>
                    </td>

                    <td class="flex">
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $admin["id"]; ?>">
                            <a class="btn btn-primary edit-button" data-bs-toggle="modal"
                                data-bs-target="#admin<?php echo $admin["id"]; ?>" data-id="">Cập nhật lại chức vụ</a>
                            <button class="btn btn-danger delete-button" name="delete"
                                onclick="return confirmDelete()">Xóa</button>
                            <a class="btn btn-primary edit-button" data-bs-toggle="modal"
                                data-bs-target="#pass<?php echo $admin["id"]; ?>" data-id="">Cấp lại mật khẩu</a>
                        </form>
                    </td>
                </tr>
                <div class="modal fade" id="admin<?php echo $admin["id"]; ?>" tabindex="-1" role="dialog"
                    aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Cập nhật lại chức vụ</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="hidden" value="<?php echo $admin["id"]; ?>" name="id">
                                        <label for="name">Tên:
                                            <?php echo $admin["username"]; ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="newrole">Chức vụ:</label>
                                        <select name="newrole">
                                            <option value="0" <?php if ($admin["role"] == 0)
                                                echo "selected"; ?>>Quản lý
                                            </option>
                                            <option value="1" <?php if ($admin["role"] == 1)
                                                echo "selected"; ?>>Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="updaterole" data-bs-dismiss="modal"
                                        class="btn btn-primary">Lưu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="pass<?php echo $admin["id"]; ?>" tabindex="-1" role="dialog"
                    aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Cấp lại mật khẩu</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="hidden" value="<?php echo $admin["id"]; ?>" name="id">
                                        <label for="name">Tên:
                                            <?php echo $admin["username"]; ?>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mật khẩu:</label>
                                        <input type="password" class="form-control" id="newpassword" name="newpassword"
                                            value="" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="updatepass" data-bs-dismiss="modal"
                                        class="btn btn-primary">Lưu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <!-- Popup sửa danh mục -->


            <div class="modal fade" id="CreateAccount" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tạo tài khoản</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="newusername">Tên tài khoản:</label>
                                    <input type="text" class="form-control" id="newusername" name="newusername" value=""
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Mật khẩu:</label>
                                    <input type="password" class="form-control" id="newpassword" name="newpassword"
                                        value="" required>
                                </div>
                                <div class="form-group" style="margin-top : 20px">
                                    <label for="newrole">Chức vụ:</label>
                                    <select name="newrole">
                                        <option value="0">Quản lý</option>
                                        <option value="1">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="add" data-bs-dismiss="modal"
                                    class="btn btn-primary">Tạo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </tbody>
    </table>



</div>






<script>
    $(document).ready(function () {

    });

    function confirmDelete() {
        return confirm("Bạn có chắc chắn muốn xóa?");
    }

</script>