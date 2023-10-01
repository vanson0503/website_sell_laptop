<?php
require_once "../config/connectDatabase.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin đăng nhập từ biểu mẫu
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Mã hóa mật khẩu bằng MD5
    $hashedPassword = md5($password);

    $sql = "SELECT * FROM admin where username='$username' and password = '$hashedPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION["idadmin"] = $row["id"];
        $_SESSION["username"] = $username;

        // Đăng nhập thành công, thực hiện các hành động tiếp theo (ví dụ: chuyển hướng đến trang chính)
        header("Location: home");
        exit();
    }
    else {
        // Đăng nhập không thành công, hiển thị thông báo lỗi
        $error = "Tên đăng nhập hoặc mật khẩu không chính xác";
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo.png">
    <title>Login</title>
    <style>
        html {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: linear-gradient(#141e30, #243b55);
        }

        .login-box {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 400px;
            padding: 40px;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, .5);
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
            border-radius: 10px;
        }

        .login-box h2 {
            margin: 0 0 30px;
            padding: 0;
            color: #fff;
            text-align: center;
        }

        .login-box .user-box {
            position: relative;
        }

        .login-box .user-box input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            margin-bottom: 30px;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            background: transparent;
        }

        .login-box .user-box label {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            pointer-events: none;
            transition: .5s;
        }

        .login-box .user-box input:focus~label,
        .login-box .user-box input:valid~label {
            top: -20px;
            left: 0;
            color: #03e9f4;
            font-size: 12px;
        }

        .login-box form .submit-button {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: #03e9f4;
            font-size: 16px;
            text-transform: uppercase;
            overflow: hidden;
            transition: .5s;
            margin-top: 40px;
            letter-spacing: 4px;
            border: none;
            background: none;
            cursor: pointer;
        }

        .login-box form .submit-button:hover {
            color: #fff;
        }

        .login-box form .submit-button::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: #03e9f4;
            top: 0;
            left: 0;
            z-index: -1;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        .login-box form .submit-button:hover::before {
            transform: scaleX(1);
            transform-origin: right;
        }

        .login-box form .submit-button span {
            position: relative;
            z-index: 1;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h2>Đăng nhập</h2>
        <form method="post" action="">
            <div class="user-box">
                <input type="text" name="username" required="">
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label>Password</label>
            </div>
            <button class="submit-button">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Submit
            </button>
        </form>
        <?php if (isset($error)) { ?>
            <p style="color:white;"><?php echo $error; ?></p>
        <?php } ?>
    </div>
</body>

</html>