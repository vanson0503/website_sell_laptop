<div class="container w-75">
    <h2 class="text-center">Thêm Sản phẩm</h2>
    <form action="?controller=products&action=create" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="brandid">Danh mục</label>
            <select class="form-control" name="category" id="categorylist">
                <?php foreach ($categorylist as$category): ?>
                    <option value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="brandid">Nhãn hiệu</label>
            <select class="form-control" name="brand" id="">
                <?php foreach ($brands as $brand): ?>
                    <option value="<?php echo $brand["id"]; ?>"><?php echo $brand["name"]; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="quantity">Số lượng:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>
        <div class="form-group">
            <label for="price">Giá:</label>
            <input type="text" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="files">Chọn ảnh:</label> <br>
            <input type="file" id="files" name="files[]" multiple class="form-control-file" required>
        </div>
        <div class="form-group">
            <label for="cpu">CPU:</label>
            <input type="text" class="form-control" id="cpu" name="cpu" required>
        </div>
        <div class="form-group">
            <label for="ram">RAM:</label>
            <input type="text" class="form-control" id="ram" name="ram" required>
        </div>
        <div class="form-group">
            <label for="cardname">Card màn hình:</label>
            <input type="text" class="form-control" id="cardname" name="cardname" required>
        </div>
        <div class="form-group">
            <label for="harddrive">Ổ cứng:</label>
            <input type="text" class="form-control" id="harddrive" name="harddrive" required>
        </div>
        <div class="form-group">
            <label for="screen">Màn hình:</label>
            <input type="text" class="form-control" id="screen" name="screen" required>
        </div>
        <div class="form-group">
            <label for="connect">Kết nối:</label>
            <input type="text" class="form-control" id="connect" name="connect" required>
        </div>
        <div class="form-group">
            <label for="operatingsystem">Hệ điều hành:</label>
            <input type="text" class="form-control" id="operatingsystem" name="operatingsystem" required>
        </div>
        <div class="form-group">
            <label for="battery">Pin:</label>
            <input type="text" class="form-control" id="battery" name="battery" required>
        </div>
        <button type="submit" class="btn btn-primary text-center" name="add">Thêm</button>
    </form>


</div>
