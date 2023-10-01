<?php
?>
<div class="mb-4">
    <div class="mb-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            Thêm nhãn hiệu
        </button>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tên nhãn hiệu</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($brands as $brand): ?>
                <tr>
                    <td>
                        <?php echo $brand['name']; ?>
                    </td>
                    <td>
                        <?php echo $brand['description']; ?>
                    </td>
                    <td class="flex">
                        <form action="?controller=brands&action=deletebyid" method="post">
                            <input type="hidden" name="id" value="<?php echo $brand['id']; ?>">
                            <a class="btn btn-primary edit-button" data-bs-toggle="modal"
                                data-bs-target="#editModal<?php echo $brand['id']; ?>"
                                data-id="<?php echo $brand['id']; ?>">Sửa</a>
                            <button class="btn btn-danger delete-button" onclick="return confirmDelete()">Xóa</button>
                        </form>
                    </td>
                </tr>
                <!-- Popup sửa danh mục -->
                <div class="modal fade" id="editModal<?php echo $brand['id']; ?>" tabindex="-1" role="dialog"
                    aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Sửa nhãn hiệu</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="?controller=brands&action=updatebrand" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="hidden" value="<?php echo $brand['id']; ?>" name="id">
                                        <label for="editName">Tên nhãn hiệu:</label>
                                        <input type="text" class="form-control" id="editName" name="editName"
                                            value="<?php echo $brand['name']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editDescription">Mô tả:</label>
                                        <textarea class="form-control" id="editDescription"
                                            name="editDescription" required><?php echo $brand['description']; ?></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Lưu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </tbody>
    </table>



</div>




<!-- Popup thêm danh mục -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <form action="?controller=brands&action=addbrand" method="post" class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm nhãn hiệu</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="addName">Tên nhãn hiệu:</label>
                    <input type="text" class="form-control" id="addName" name="name">
                </div>
                <div class="form-group">
                    <label for="addDescription">Mô tả:</label>
                    <textarea class="form-control" id="addDescription" name="description"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="addbrandbtn" class="btn btn-primary">Thêm</button>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function () {

    });

    function confirmDelete() {
        return confirm("Bạn có chắc chắn muốn xóa?");
    }

</script>