<?php
include '../db/connection.php';

?>
<div class=" flex flex-col items-center justify-center translate-y-32 translate-x-64 flex-wrap  w-[80%] overflow-x-hidden">
    <div class="flex justify-between items-center">
        <form class='m-4 flex flex-row justify-start items-center w-[100%] ml-10' method="post">
            <input type="text" name="query" placeholder='Student ID' id="number" class=" shadow-lg shadow-gray-700 bg-gradient-to-r to-slate-900 from-blue-900 rounded-tl-lg rounded-bl-lg w-96 h-10 p-7  text-slate-200 border-3 border-black">
            <input type="submit" name="submit" value="search" class="shadow-lg shadow-gray-700 bg-stone-900 p-5 rounded-br-lg rounded-tr-lg flex justify-center items-center w-36 text-slate-200 text-sm add-student">
        </form>
        <div class='   bg-stone-900 p-3 rounded-lg flex justify-center items-center w-[30%] text-slate-200 text-sm add-student'>
            <a href="./addStudent.php">ADD STUDENT</a>
        </div>

    </div>
    <table class="bg-white border-2 border-solid overflow-y-visible border-black border-collapse shadow-gray-600 rounded-2xl mt-16 bg-gradient-to-b from-slate-900 to-blue-900 overflow-x-hidden">
        <tr class=" text-stone-900">
            <th class=" bg-stone-900 text-white">ID</th>
            <th class=" bg-stone-900 text-white">NAME</th>
            <th class=" bg-stone-900 text-white">EMAIL</th>
            <th class=" bg-stone-900 text-white">PASSWORD</th>
            <th class=" bg-stone-900 text-white">DOB</th>
            <th class=" bg-stone-900 text-white">SEX</th>
            <th class=" bg-stone-900 text-white">ADDRESS</th>
            <th class=" bg-stone-900 text-white">PHONE</th>
            <th class=" bg-stone-900 text-white">DOJ</th>
            <th class=" bg-slate-200"></th>
        </tr>
        <?php
        if (!isset($_POST['submit']) || $_POST['query'] == '') {
            $query = 'select * from student';
            $query = mysqli_query($conn, $query);
        } else {
            $query = 'select * from student where student_id = ' . $_POST['query'];
            $query = mysqli_query($conn, $query);
        }
        while ($student_list = mysqli_fetch_assoc($query)) {


        ?>
            <tr class="border-collapse">
                <td class=" border-2 px-2 py-0 border-solid border-gray-100 text-slate-200 text-sm"><?= $student_list['student_id'] ?></td>
                <td class=" border-2 px-2 py-0 border-solid border-gray-100 text-slate-200 text-sm"><?= $student_list['name'] ?></td>
                <td class=" border-2 px-2 py-0 border-solid border-gray-100 text-slate-200 text-sm"><?= $student_list['email'] ?></td>
                <td class=" border-2 px-2 py-0 border-solid border-gray-100 text-slate-200"><?= $student_list['password'] ?></td>
                <td class=" border-2 px-2 py-0 border-solid border-gray-100 text-slate-200 text-xs"><?= $student_list['dob'] ?></td>
                <td class=" border-2 px-2 py-0 border-solid border-gray-100 text-slate-200"><?= $student_list['sex'] ?></td>
                <td class=" border-2 px-2 py-0 border-solid border-gray-100 text-slate-200 text-sm"><?= $student_list['Address'] ?></td>
                <td class=" border-2 px-2 py-0 border-solid border-gray-100 text-slate-200"><?= $student_list['phone'] ?></td>
                <td class=" border-2 px-2 py-0 border-solid border-gray-100 text-slate-200 text-sm"><?= $student_list['date_of_join'] ?></td>

                <td class="p-4 bg-slate-200">

                    <div class="text-green-800 block h-6 p-3 m-3">

                        <a href="./updateStudent.php?st=<?= $student_list['student_id'] ?>"><i class="fa fa-lg fa-exchange "></i> </a>
                    </div>
                    <div class="text-red-700 block h-6 p-3 m-3" onclick="confirm('Do You Want to Delete The Student?')">
                        <a href="delStudent.php?st=<?= $student_list['student_id'] ?>"> <i class="fa fa-lg fa-trash-can "></i></a>
                    </div>

                </td>

            </tr>

        <?php

        } ?>
    </table>

</div>