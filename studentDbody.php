<?php
error_reporting(E_ALL ^ ~E_NOTICE);
$query = "select * from parent where parent_id = '" . $_SESSION['user']['parent_id'] . "'" ;
$query2 = "select * from classroom_student where student_id = '" . $_SESSION['user']['student_id'] . "'" ;
$query2 = mysqli_fetch_assoc(mysqli_query($conn, $query2));
$query3 = "select * from classroom where classroom_id = '" . $query2['classroom_id'] . "'" ;
$query3 = mysqli_fetch_assoc(mysqli_query($conn, $query3));
$query4 = "select * from grade where grade_id = '" . $query3['grade_id'] . "'" ;


$parent = mysqli_fetch_assoc(mysqli_query($conn, $query));
$classroom = $query3;
$grade = mysqli_fetch_assoc(mysqli_query($conn, $query4));

?>
<div class=" flex flex-col items-center justify-between translate-y-28 translate-x-64 w-[80%] overflow-x-hidden">
    <div class=" text-slate-600 text-2xl w-[100%] ">
       <h1 class="text-center  border-slate-600">GENERAL INFORMATION</h1>
    </div><br><br>
    <div class=" flex items-start justify-evenly w-[100%]">
    <div class="flex flex-col justify-center items-center">
        <h1 class="text-2xl bg-stone-900 text-slate-200 p-3 w-[100%]">Personal Info</h1>
        <ul class="bg-slate-200  rounded-bl-xl rounded-br-xl border-2 border-slate-600 flex flex-col justify-center items-center">
            <li class="p-4 border-b-2  text-slate-600 text-sm border-slate-600 w-[100%]">Student: <?= $_SESSION['user']['name']?></li>
            <li class="p-4 border-b-2  text-slate-600 text-sm border-slate-600 w-[100%]">Email: <?= $_SESSION['user']['email']?></li>
            <li class="p-4 border-b-2  text-slate-600 text-sm border-slate-600 w-[100%]">Birth: <?= $_SESSION['user']['dob']?></li>
            <li class="p-4 border-b-2  text-slate-600 text-sm border-slate-600 w-[100%]">Gender: <?= $_SESSION['user']['sex']?></li>
            <li class="p-4 border-b-2  text-slate-600 text-sm border-slate-600 w-[100%]">Address: <?= $_SESSION['user']['Address']?></li>
            <li class="p-4 border-b-2  text-slate-600 text-sm border-slate-600 w-[100%]">Phone: <?= $_SESSION['user']['phone']?></li>
            <li class="p-4  text-slate-600 text-sm border-slate-600 w-[100%]">Joined: <?= $_SESSION['user']['date_of_join']?></li>

        </ul>
    </div>
    <?php if($parent){?>
    <div>
    <h1 class="text-2xl  bg-stone-900 text-slate-200 p-3 w-[100%]">Parent Details</h1>
        <ul class="bg-slate-200  rounded-bl-xl rounded-br-xl border-2 border-slate-600 flex flex-col justify-center items-center">
            <li class="p-4 border-b-2  text-slate-600 text-sm border-slate-600 w-[100%]">Parent: <?= $parent['name']?></li>
            <li class="p-4 border-b-2  text-slate-600 text-sm border-slate-600 w-[100%]">Email: <?= $parent['email']?></li>
            <li class="p-4 text-slate-600 text-sm border-slate-600 w-[100%]">Phone: <?= $parent['phone']?></li>

        </ul>
    </div>
    <?php } ?>
    <?php if($grade){?>
    <div>
    <h1 class="text-2xl  bg-stone-900 text-slate-200 p-3 w-[100%]">School Details</h1>
    <ul class="bg-slate-200  rounded-bl-xl rounded-br-xl border-2 border-slate-600 flex flex-col justify-center items-center">
            <li class="p-4 border-b-2  text-slate-600 text-sm border-slate-600 w-[100%]">Grade: <?= $grade['name']?></li>
            <li class="p-4 border-b-2  text-slate-600 text-sm border-slate-600 w-[100%]">Section: <?= $classroom['section']?></li>
            <li class="p-4 text-slate-600 text-sm border-slate-600 w-[100%]">classroom: <?= $classroom['classroom_id']?></li>

        </ul>
    </div>
    <?php }?>
</div>
</div>