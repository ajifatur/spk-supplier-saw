<!DOCTYPE html>
<html>
<head>
    <?php include "_head.php"; ?>
</head>
<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h1>YNTKTS</h1>
        </div>
        <div class="login-box p-4">
            <form id="form-login" method="POST" action="ceklogin.php">
                <h3 class="login-head">Selamat Datang!</h3>
                <div class="alert alert-danger text-center" style="display:none;" id="alert">
                    <i class="fa fa-exclamation-triangle fa-lg"></i><p class="mb-0" id="alert-message"></p>
                </div>
                <div class="form-group">
                    <label class="control-label">Username</label>
                    <input class="form-control" name="username" type="text" placeholder="Username" autofocus>
                </div>
                <div class="form-group">
                    <label class="control-label">Password</label>
                    <input class="form-control" name="password" type="password" placeholder="Password">
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>Masuk</button>
                </div>
            </form>
        </div>
    </section>
    <?php include "_js.php"; ?>
</body>
</html>