<div class=" flex flex-col items-center justify-between translate-y-28 translate-x-44 w-[80%] overflow-x-hidden">
<h1 class="text-center text-2xl text-slate-700">SETTINGS</h1>
<br><br>
<form action="" method="post" class="flex flex-col justify-center">
<label for="email" class="text-sm text-center p-6">
<h1 class=" text-xl bg-slate-600 text-slate-200">EMAIL</h1>
<br>
Enter the new Email: <br>
<input type="email" name="email" id="email" class="bg-gray-300 rounded-tl-lg rounded-bl-lg w-80 h-8 p-3 border-3 border-black">
<input type="submit" name="s-email" value="CHANGE" class="bg-slate-600 text-slate-200 rounded-tr-lg rounded-br-lg w-20 h-8 "><br><br>
</label>

<label for="pass" class="text-sm text-center ">
<h1 class=" text-xl bg-slate-600 text-slate-200">PASSWORD</h1>
<br>
Enter the new Password: <br>
<input type="password" name="pass" id="pass" class="bg-gray-300 rounded-tl-lg rounded-bl-lg w-80 h-8 p-3 border-3 border-black">
<input type="submit" name="s-pass" value="CHANGE" class="bg-slate-600 text-slate-200 rounded-tr-lg rounded-br-lg w-20 h-8 ">
</label>

</form>
</div>


<?php
include './db/connection.php';
if(isset($_POST['s-email'])){
    if(trim(strlen($_POST['email'])) > 4 && str_contains($_POST['email'], '@')){
        $query = "update student set email = '" . $_POST['email'] . "' where student_id = " . $_SESSION['user']['student_id'];
        $c = mysqli_query($conn, $query);
        echo "<script>alert('EMAIL SUCCESSFULLY CHANGED $c')</script>";
    }else{
        echo "<script>alert('THE EMAIL IS INVALID')</script>";
    }
}
if(isset($_POST['s-pass'])){
    if(trim(strlen($_POST['pass'])) > 4){
        $query = "update student set password = '" . $_POST['pass'] . "' where student_id = " . $_SESSION['user']['student_id'];
        $c = mysqli_query($conn, $query);
        echo "<script>alert('PASSWORD SUCCESSFULLY CHANGED $c')</script>";
        unset($_SESSION['user']);
    }else{
        echo "<script>alert('THE PASSWORD IS INVALID')</script>";
    }
}

?>