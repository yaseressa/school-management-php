<?php
session_start();
if (isset($_SESSION['admin'])) {
    header('Location: adminDash.php');
}
if (isset($_POST['submit'])) {
    include '../db/connection.php';
    $query = "select * from admin where email = '" . $_POST['email'] . "' AND " . "password = '" . $_POST['pass'] . "'";
    if ($admin = mysqli_fetch_assoc(mysqli_query($conn, $query))) {
        session_start();
        $_SESSION['admin'] = $admin;
        header('Location: adminDash.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../styles/style_out.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body class=" overflow-hidden bg-slate-600  ">
    <h1 class="absolute right-0 text-left text-2xl bg-slate-200 p-2 pl-6 z-10 w-[25%] rounded-bl-2xl">ADMIN PANEL</h1>

    <div class="w-[100%] m-auto flex flex-row justify-evenly items-start ">

        <div class=" h-screen relative w-[45%] translate-x-[-24] z-0 flex flex-col justify-between items-center shadow-xl  bg-gradient-to-br from-blue-900 to-slate-900  shadow-slate-500">
            <div class=" flex flex-col justify-center justify-self-start items-center z-10 text-slate-200 translate-y-9">
                <h1 class="text-2xl tracking-widest">School Name</h1>
                <img src="../resource/logo.png" alt="" class="w-[50%]">
            </div>
            <form action="" method='post' class="w-[70%]  rounded-2xl px-10  bg-slate-200 border-4 flex flex-col justify-center items-center relative bottom-[40px]">
                <h1 class=" text-slate-200 text-xl w-[100%] text-center tracking-widest bg-slate-600">SIGN-IN</h1>
                <label for="" class=' mt-6 text-sm'>
                    EMAIL ADDRESS <br>
                    <input type="text" name="email" class=" bg-gray-300 rounded-lg w-80 h-10 pl-4 border-2 border-slate-600 py-3 border-3  focus-visible:animate-pulse">
                </label>
                <label for="" class=" mt-6 text-sm">
                    PASSWORD <br>
                    <input type="password" name="pass" class="  bg-gray-300 rounded-lg w-80 h-10 pl-4 border-2 border-slate-600 py-3 border-3  focus-visible:animate-pulse">
                </label>
                <input type="submit" name="submit" class=" bg-gradient-to-tl from-blue-900 to-slate-600 text-slate-200 text-sm rounded-sm w-[70%] mt-7 p-2">
                <br><br>
            </form>

        </div>
        <img src="../resource/admin.png" alt="" class=" image top-16 relative w-[40%] animate-f">
    </div>

</body>

</html>