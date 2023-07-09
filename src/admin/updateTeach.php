<?php
session_start();
if (isset($_SESSION['admin'])) {
    $head = 'ADMIN PANEL';
    $spinte = 'bg-slate-200 md:translate-x-6 mx-3 flex justify-end items-center text-slate-600 shadow-lg shadow-black p-4';
    include '../db/connection.php';
    include './layout/headers.php';
    include './layout/sideBar.php';
    include './updateTbody.php';
} else {
    echo "<script>confirm('log-in first')</script>";
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_out.css">
    <link rel="icon" href="../resource/admin-av.png">
    <link rel="stylesheet" href="../styles/font-awesome/css/all.css">
    <title>Admin Dashboard</title>

</head>

<body class="bg-slate-200">

</body>

</html>