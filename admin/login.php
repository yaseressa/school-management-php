<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../styles/style_out.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class=" overflow-hidden bg-slate-600  ">
    <h1 class="absolute right-0 text-left text-2xl bg-slate-200 p-2 pl-6 z-10 w-[25%] rounded-bl-2xl">ADMIN PANEL</h1>
   
    <div class="w-[100%] m-auto flex flex-row justify-evenly items-start ">
        
        <div class=" h-[700px] relative w-[45%] bg-slate-200 translate-x-[-24] z-0 flex flex-col justify-evenly items-center shadow-xl  shadow-slate-500">
        <div class=" flex flex-col justify-center justify-self-start items-center z-10">
        <h1 class="text-2xl">School Name</h1>
        <img src="../resource/logo.png" width="100" height="100" alt="">
        </div>
        <form action="" method='post' class="w-[40%] rounded-lg border-blue-400 flex flex-col justify-center items-center relative z-10">
            <h1 class=" bg-slate-600 text-3xl text-slate-200 w-[100%] text-center rounded-tl-xl rounded-tr-xl">SIGN-IN</h1>
            <label for="" class=' mt-6'>
            EMAIL ADDRESS <br>
            <input type="text" name="email" class=" bg-gray-300 rounded-lg w-80 h-8 py-3 border-3 border-black hover:animate-pulse">
            </label>
            <label for="" class=" mt-6">
            PASSWORD <br>
            <input type="password" name="pass" class=" bg-gray-300 rounded-lg w-80 h-8 py-3">
            </label>
            <input type="submit" name="submit" class=" bg-slate-600 text-slate-200 rounded-lg w-64 mt-9 p-2">
        </form>
        <img src="../resource/setting.png" alt="" width="300" height="300" class="absolute z-0 opacity-30 left-2 bottom-2 animate-pulse">
</div>
        <img src="../resource/admin.png" alt="" width="550" height="600" class=" image top-16 relative animate-f">
    </div>
    <?php 
    session_start();
    if(isset($_SESSION['admin'])){
        header('Location: adminDash.php');
    }
        if(isset($_POST['submit'])){
include '../db/connection.php';
            $query = "select * from admin where email = '" . $_POST['email'] . "' AND " . "password = '" . $_POST['pass'] . "'";
            if($admin = mysqli_fetch_assoc(mysqli_query($conn, $query))){
              session_start();
              $_SESSION['admin'] = $admin;
              header('Location: adminDash.php');
            }
    
        }
    ?>
</body>
</html>