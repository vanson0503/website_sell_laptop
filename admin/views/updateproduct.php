<div class="container w-75">
    <h2 class="text-center">Cập nhật Sản phẩm</h2>
    <form action="?controller=products&action=update" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $data['product']['id'] ?>">
        <div class="form-group">
            <label for="brandid">Danh mục</label>
            <select class="form-control" name="category" id="categorylist">
                <?php foreach ($categorylist as $category): ?>
                    <option value="<?php echo $category['id']; ?>" <?php echo ($category['id'] == $data['product']['categoryid']) ? 'selected' : ''; ?>><?php echo $category['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="brandid">Nhãn hiệu</label>
            <select class="form-control" name="brand" id="">
                <?php foreach ($brands as $brand): ?>
                    <option value="<?php echo $brand['id']; ?>" <?php echo ($brand['id'] == $data['product']['brandid']) ? 'selected' : ''; ?>><?php echo $brand['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $data['product']['name'] ?>"
                required>
        </div>
        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea class="form-control" id="description" name="description"
                required><?= $data['product']['description'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="quantity">Số lượng:</label>
            <input type="number" class="form-control" id="quantity" name="quantity"
                value="<?= $data['product']['quantity'] ?>" required>
        </div>
        <div class="form-group">
            <label for="price">Giá:</label>
            <input type="text" class="form-control" id="price" name="price" value="<?= $data['product']['price'] ?>"
                required>
        </div>

        
        

        <div class="form-group">
            <label for="cpu">CPU:</label>
            <input type="text" class="form-control" id="cpu" name="cpu" value="<?= $configuration['cpu'] ?>" required>
        </div>
        <div class="form-group">
            <label for="ram">RAM:</label>
            <input type="text" class="form-control" id="ram" name="ram" value="<?= $configuration['ram'] ?>" required>
        </div>
        <div class="form-group">
            <label for="cardname">Card màn hình:</label>
            <input type="text" class="form-control" id="cardname" name="cardname"
                value="<?= $configuration['cardname'] ?>" required>
        </div>
        <div class="form-group">
            <label for="harddrive">Ổ cứng:</label>
            <input type="text" class="form-control" id="harddrive" name="harddrive"
                value="<?= $configuration['harddrive'] ?>" required>
        </div>
        <div class="form-group">
            <label for="screen">Màn hình:</label>
            <input type="text" class="form-control" id="screen" name="screen" value="<?= $configuration['screen'] ?>"
                required>
        </div>
        <div class="form-group">
            <label for="connect">Kết nối:</label>
            <input type="text" class="form-control" id="connect" name="connect" value="<?= $configuration['connect'] ?>"
                required>
        </div>
        <div class="form-group">
            <label for="operatingsystem">Hệ điều hành:</label>
            <input type="text" class="form-control" id="operatingsystem" name="operatingsystem"
                value="<?= $configuration['operatingsystem'] ?>" required>
        </div>
        <div class="form-group">
            <label for="battery">Pin:</label>
            <input type="text" class="form-control" id="battery" name="battery" value="<?= $configuration['battery'] ?>"
                required>
        </div>
        <button type="submit" class="btn btn-primary text-center" name="update">Cập nhật</button>
    </form>
    <div class="form-group">
            <label for="images">Ảnh:</label>

            <div id="image-container" class="d-flex flex-wrap">
                <?php foreach ($images as $image): ?>
                    <form action="?controller=products&action=delete_image" method="post" class="image-item">
                        <input type="hidden" name="product_id" value="<?= $data['product']['id'] ?>">
                        <input type="hidden" name="id" value="<?= $image['id'] ?>">
                        <img src="../uploads/<?= $image['url'] ?>" alt="Product Image" width="120">
                        <button class="btn btn-danger delete-image" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                <?php endforeach; ?>
            </div>


        </div>

    <div class="form-group pt-5">
            <form action="?controller=products&action=add_image" method="post" enctype="multipart/form-data">
                <input type="hidden" name="product_id" value="<?= $data['product']['id'] ?>">
                <label for="files">Chọn ảnh:</label>
                <input type="file" id="files" name="files[]" multiple class="form-control-file" required>
                <button type="submit" class="btn btn-primary" name="add_image">Thêm ảnh</button>
            </form>
        </div>
</div>