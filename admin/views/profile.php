<style>
    .card {
        margin: 0 auto;
        margin-top: 50px;
        max-width: 400px;
    }

    .avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin: -50px auto 10px;
        object-fit: cover;
    }
</style>
<div class="container">
    <div class="card">
        <img src="assets/images/admin.jpg" alt="Avatar" class="avatar">
        <div class="card-body">
            <h5 class="card-title">Wellcome</h5>
            <p class="card-text">Username: <?php echo $admin["username"] ?></p>
            <p class="card-text">Role: <?php if($admin["role"]==1){
                echo "Admin";
            }else{
                echo "Quản lý";
            } ?></p>
            <!-- Add more card content for other personal information -->
        </div>
    </div>
</div>