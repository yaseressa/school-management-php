<?php
include '../db/connection.php';
$query = 'select COUNT(student_id) from student';
$query2 = 'select COUNT(teacher_id) from teacher';
$query3 = 'select COUNT(classroom_id) from classroom';
$query4 = 'select COUNT(subject_id) from subject';
$query = mysqli_fetch_array(mysqli_query($conn, $query));
$query2 = mysqli_fetch_array(mysqli_query($conn, $query2));
$query3 = mysqli_fetch_array(mysqli_query($conn, $query3));
$query4 = mysqli_fetch_array(mysqli_query($conn, $query4));

?>

<div class=" translate-x-[35%] translate-y-36 w-[70%] flex items-center justify-between flex-wrap overflow-x-hidden">

    <div class="flex flex-row justify-center items-center hover:transition-opacity hover:scale-90 hover:cursor-pointer relative w-[45%] bg-gradient-to-tr from-gray-900 shadow-md shadow-gray-600 to-slate-600 rounded-lg p-5 px-28 text-slate-200">
        <img src="../resource/std_av.png" alt="" width="120" class="opacity-60">
        <div class="flex flex-col justify-center items-center ">
            <a href="./studentDash.php" class="flex flex-col justify-center items-center">
                <h2 class="text-xl w-12'">STUDENTS</h2>
                <h3 class="text-xl"><?= $query[0] ?></h3>
        </div></a>
        <h3 class="absolute bottom-0 right-0  bg-white rounded-tl-2xl  text-stone-900 p-3"><a href="./studentDash.php">VIEW</a></h3>
    </div>

    <div class="flex flex-row justify-evenly items-center relative hover:transition-opacity hover:scale-90 hover:cursor-pointer w-[45%] bg-gradient-to-tr from-gray-900 shadow-md shadow-gray-600 to-yellow-900 rounded-lg p-5 px-28 text-slate-200">
        <img src="../resource/teacher-av.png" alt="" width="120" class="opacity-50">
        <a href="./teachDash.php">
            <div class="flex flex-col justify-center items-center ">
                <h2 class="text-xl w-12'">TEACHERS</h2>
                <h3 class="text-xl "><?= $query2[0] ?></h3>
            </div>
        </a>
        <h3 class="absolute bottom-0 right-0  bg-white rounded-tl-2xl  text-stone-900 p-3"><a href="./teachDash.php">VIEW</a></h3>
    </div>


    <div class="flex flex-row justify-center items-center relative hover:transition-opacity hover:scale-90 hover:cursor-pointer w-[45%] bg-gradient-to-tr from-gray-900 shadow-md shadow-gray-600 to-blue-900 mt-4 rounded-lg p-5 px-28 text-slate-200">

        <img src="../resource/class-av.png" alt="" width="120" class="opacity-50">
        <a href="./classDash.php">
            <div class="flex flex-col justify-center items-center ">
                <h2 class="text-xl ">CLASSROOMS</h2>
                <h3 class="text-xl "><?= $query3[0] ?></h3>
            </div>
        </a>
        <h3 class="absolute bottom-0 right-0  bg-white rounded-tl-2xl  text-stone-900 p-3"><a href="./classDash.php">VIEW</a></h3>
    </div>

    <div class="flex flex-row justify-center items-center hover:transition-opacity hover:scale-90 hover:cursor-pointer  w-[45%] bg-gradient-to-tr from-gray-900 shadow-md shadow-gray-600 to-green-900 mt-4 rounded-lg p-5 px-28 text-slate-200">
        <img src="../resource/subject-av.png" alt="" width="110" class="opacity-50">
        <a href="subjectDash.php">
            <div class="flex flex-col justify-center items-center ">
                <h2 class="text-xl ">SUBJECTS</h2>
                <h3 class="text-xl "><?= $query4[0] ?></h3>
            </div>
        </a>
        <h3 class="absolute bottom-0 right-0  bg-white rounded-tl-2xl  text-stone-900 p-3"><a href="subjectDash.php">VIEW</a></h3>
    </div>
</div>