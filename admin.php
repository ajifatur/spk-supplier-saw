<?php
require "./connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "_head.php"; ?>
</head>
<body class="app sidebar-mini">
    <?php include "_navbar.php"; ?>
    <?php include "_sidebar.php"; ?>
    <!-- Content Wrapper -->
    <main class="app-content">
        <?php include "page.php"; ?>
    </main>
    <?php include "_js.php"; ?>
</body>
</html>