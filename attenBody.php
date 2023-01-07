<div class=" flex flex-col items-center justify-between translate-y-28 translate-x-52 w-[80%] overflow-x-hidden">
<h1 class="text-center text-2xl text-slate-700">ATTENDANCE</h1>
<br><br>
<form action="" method="post">
<label for="date" class="text-sm text-center">
Enter the Date: <br>
</label>
<input type="date" name="date" id="date" class="bg-gray-300 rounded-tl-lg rounded-bl-lg w-80 h-8 p-3 border-3 border-black">
<input type="submit" name="submit" value="search" class="bg-slate-600 text-slate-200 rounded-tr-lg rounded-br-lg w-20 h-8 ">
</form>
<br><br><br>

        <table class="w-[600px] border-1 border-black" >
            <tr>
                <th class=" bg-slate-600 text-slate-200">DATE</th>
                <th class=" bg-slate-600 text-slate-200">STATUS</th>

            </tr>
            
<?php
if(isset($_POST['submit'])){
    include './db/connection.php';
    $query = "select * from attendence where (student_id = '" . $_SESSION['user']['student_id'] . "') AND date LIKE '" . $_POST['date'] . "'";
    $it = mysqli_query($conn, $query);
    while($attend = mysqli_fetch_assoc($it)){
        $d=$attend['date'];
        $s=$attend['status'];
        echo "    <tr>
        <th>$d</th>
        <th>$s</th>

    </tr>";
    }
}

?>
        </table>
    </div>

