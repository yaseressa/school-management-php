<?php
include '../db/connection.php';
$queryt = mysqli_query($conn, 'select * from classroom left join grade using(grade_id);');;
?>
<script src="./scripts/students.js"></script>
<div class=" flex flex-col items-center justify-center translate-y-32 translate-x-[20%]  w-[82%] overflow-x-hidden">
    <div class="flex justify-between items-center w-full">

        <div class="flex flex-col flex-wrap ml-20 w-full">
            <form action="" class="flex flex-row whitespace-nowrap justify-start items-center w-[100%]" method='post'>
                <input type="date" name="date" id="number" class=" shadow-lg  shadow-gray-700 bg-gradient-to-r to-slate-900 from-blue-900 rounded-lg mr-10 w-96 h-10 p-3  text-slate-200 border-3 border-black">

                <select value='CHOOSE A CLASS' class="bg-gradient-to-r  to-slate-900 from-blue-900 shadow-lg shadow-gray-700 text-slate-200 rounded-bl-lg rounded-tl-lg w-[70%] h-11 p-3" name='classes'>
                    <option value="" class="text-gray-600">CHOOSE A CLASSROOM</option>
                    <?php

                    while ($qt = mysqli_fetch_assoc($queryt)) { ?>
                        <option class="text-blue-900 " value="<?= $qt['classroom_id'] ?>"><?= $qt['classroom_id'] ?> - <?= $qt['name'] ?> - <?= $qt['section'] ?></option>
                    <?php } ?>

                </select>
                <input type="submit" name="submitc" value="search" class="shadow-lg shadow-gray-700 bg-stone-900 p-3 rounded-br-lg  rounded-tr-lg flex justify-center items-center w-[25%] text-slate-200 text-sm add-Teacher">
                <input type="text" name="query" placeholder='Student ID' id="number" class=" translate-x-6 bg-gradient-to-r to-slate-900 from-blue-900 shadow-lg shadow-gray-700 text-slate-200 rounded-bl-lg rounded-tl-lg w-[50%] h-11 p-3">
                <input type="submit" name="submit" value="search" class="translate-x-6 shadow-lg shadow-gray-700 bg-stone-900 p-3 rounded-br-lg  rounded-tr-lg flex justify-center items-center w-[25%] text-slate-200 text-sm add-Teacher">
            </form>
        </div>

    </div>
    <table class="bg-white border-2 border-solid border-black border-collapse shadow-gray-600 mt-16 ml-16 rounded-2xl bg-gradient-to-b from-slate-900 to-blue-900">

        <tr class=" text-stone-900">
            <th class=" bg-stone-900 text-white">DATE</th>
            <th class=" bg-stone-900 text-white">ID</th>
            <th class=" bg-stone-900 text-white">NAME</th>
            <th class=" bg-stone-900 text-white">STATUS</th>


        </tr>
        <?php

        if (isset($_POST['submit']) && $_POST['query'] && $_POST['date']) {
            $query = "select attendence.date as date,student.student_id as id, student.name as name, attendence.status as status from attendence join student using(student_id) where student_id = " . $_POST['query'] . " AND date = '" . $_POST['date'] . "';";
            $query = mysqli_query($conn, $query);
        } elseif (isset($_POST['submitc']) && $_POST['classes'] && $_POST['date']) {
            $q = "select attendence.date as date,student.student_id as id, student.name as name, attendence.status as status  from attendence join student using(student_id) join classroom_student using(student_id) join classroom using(classroom_id) where classroom_id ='" . $_POST['classes'] . "' AND date = '" . $_POST['date'] . "';";
            $query = mysqli_query($conn, $q);
        } else {
            $q = "select attendence.date as date,student.student_id as id, student.name as name, attendence.status as status  from attendence join student using(student_id) join classroom_student using(student_id) join classroom using(classroom_id);";
            $query = mysqli_query($conn, $q);
        }



        while ($student_list = mysqli_fetch_assoc($query)) {


        ?>
            <tr class="border-collapse">

                <td class=" border-2 px-2 py-0 border-solid border-gray-100 text-slate-200 text-sm"><?= $student_list['date'] ?></td>
                <td class=" border-2 px-2 py-0 border-solid border-gray-100 text-slate-200 text-sm"><?= $student_list['id'] ?></td>
                <td class=" border-2 px-2 py-0 border-solid border-gray-100 text-slate-200 text-sm"><?= $student_list['name'] ?></td>
                <td class=" border-2 px-2 py-0 border-solid border-gray-100 text-slate-200 text-sm"><?= $student_list['status'] ?></td>

            <?php
        } ?>




    </table>

</div>