<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="styles/style_out.css">
    <link rel="icon" href="./resource/std_av.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Log-in</title>
</head>
<body class=" overflow-hidden bg-slate-600  ">
    <h1 class="absolute left-0 text-right text-2xl bg-slate-200 text-slate-600 p-2 pr-6 z-10 w-[25%] rounded-br-2xl">FOR STUDENTS ONLY</h1>
    <div class="absolute bg-slate-200 p-6 w-[12%] rounded-lg break-keep left-[530px] top-[20%] border-2 border-blue-400 animate-bounce"><h1 class=" text-md text-slate-600">Sign-in with the credentionals given by the school</h1></div>
   
    <div class="w-[100%] m-auto flex flex-row-reverse justify-evenly items-start ">
        
        <div class=" h-[700px] relative w-[45%] bg-slate-200 translate-x-24 z-0 flex flex-col justify-evenly items-center shadow-xl  shadow-slate-500">
        <div class=" flex flex-col justify-center justify-self-start items-center z-10">
        <h1 class="text-2xl">School Name</h1>
        <img src="./resource/logo.png" width="100" height="100" alt="">
        </div>
        <form action="" method="post" class="w-[40%] rounded-lg border-blue-400 flex flex-col justify-center items-center relative z-10">
            <h1 class=" bg-slate-600 text-3xl text-slate-200 w-[100%] text-center rounded-tl-xl rounded-tr-xl">SIGN-IN</h1>
            <label for="" class=' mt-6'>
            EMAIL ADDRESS <br>
            <input type="text" name="email" class=" bg-gray-300 rounded-lg w-80 h-8 p-3 border-3 border-black hover:animate-pulse">
            </label>
            <label for="" class=" mt-6">
            PASSWORD <br>
            <input type="password" name="pass" class=" bg-gray-300 rounded-lg w-80 h-8 p-3">
            </label>
            <input type="submit" name="submit" class=" bg-slate-600 text-slate-200 rounded-lg w-64 mt-9 p-2">
        </form>
        <img src="./resource/bp.png" alt="" width="300" height="300" class="absolute z-0 opacity-30 right-2 bottom-2 animate-pulse">
</div>
        <img src="./resource/student.png" alt="" width="400" height="200" class=" image top-16 relative animate-appear">
    </div>
    <?php 
    session_start();
    if(isset($_SESSION['user'])){
        header('Location: studentDash.php');
    }
        if(isset($_POST['submit'])){
include './db/connection.php';
            $query = "select * from student where email = '" . $_POST['email'] . "' AND " . "password = '" . $_POST['pass'] . "'";
            if($user = mysqli_fetch_assoc(mysqli_query($conn, $query))){
              session_start();
              $_SESSION['user'] = $user;
              header('Location: studentDash.php');
            }
    
        }
    ?>
</body>
</html>