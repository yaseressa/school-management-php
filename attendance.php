<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style_out.css">
    <link rel="icon" href="./resource/std_av.png">
    <link rel="stylesheet" href="./styles/font-awesome/css/all.css">
    <title>Exams</title>
</head>

<body class="bg-slate-200">
    <?php
    session_start();
    if (isset($_SESSION['user'])) {
        $head = 'STUDENT PANEL';
        $attend = 'bg-slate-200 translate-x-6 flex justify-end items-center text-slate-600 shadow-lg shadow-black p-4';
        $spina = 'fa-spin';
        include './layout/headers.php';
        include './layout/sideBar.php';
        include './attenBody.php';
    } else {
        echo "<script>continue('log-in first')</script>";
        header('Location: login.php');
    }
    ?>
</body>

</html>