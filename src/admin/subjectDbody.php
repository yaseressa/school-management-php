<?php
include '../db/connection.php';
?>
<script src="./scripts/students.js"></script>
<div class=" flex flex-col items-center justify-center translate-y-32 md:translate-x-[20%]  md:w-[80%] overflow-x-hidden">
    <div class="flex md:flex-row flex-col w-[80%] justify-center items-center">
        <form class='m-4 flex flex-row justify-center items-center w-[100%] md:ml-10' method="post">
            <input type="text" name="query" placeholder='Subject ID' id="number" class=" shadow-lg shadow-gray-700 bg-gradient-to-r to-slate-900 from-blue-900 rounded-tl-lg rounded-bl-lg w-96 h-10 p-7  text-slate-200 border-3 border-black">
            <input type="submit" name="submit" value="search" class="shadow-lg shadow-gray-700 bg-stone-900 p-5 rounded-br-lg translate-x-[-20%] rounded-tr-lg flex justify-center items-center w-36 text-slate-200 text-sm add-Teacher">
        </form>
        <div class='   whitespace-nowrap md:m-0 m-4 bg-stone-900 md:p-3 p-4 px-7 rounded-lg flex justify-center items-center w-40 text-slate-200 text-sm add-Teacher'><a href="./addSubject.php">ADD SUBJECT</a></div>

    </div>
    <table class="bg-white border-2 border-solid border-black border-collapse shadow-gray-600 mt-16 rounded-2xl bg-gradient-to-b from-slate-900 to-blue-900">
        <tr class=" text-stone-900">
            <th class="md:p-4 md:px-10 px-3 bg-stone-900 text-white">ID</th>
            <th class="md:p-4 md:px-10 px-3 bg-stone-900 text-white">NAME</th>
            <th class="md:p-4 md:px-10 px-3 bg-stone-900 text-white">TEACHER</th>
            <th class="md:p-4 md:px-10 px-3 bg-stone-900 text-white">GRADE</th>
            <th class="md:p-4 md:px-10 px-3 bg-slate-200"></th>

        </tr>
        <?php
        if (!isset($_POST['submit']) || $_POST['query'] == '') {
            $query = 'select * from subject';
            $query = mysqli_query($conn, $query);
        } else {
            $query = 'select * from subject where subject_id = ' . $_POST['query'];
            $query = mysqli_query($conn, $query);
        }

        while ($subject_list = mysqli_fetch_assoc($query)) {
            $query2 = 'select name from teacher where teacher_id = ' . $subject_list['teacher_id'];
            $te = mysqli_fetch_assoc(mysqli_query($conn, $query2));
            $query3 = 'select name from grade where grade_id = ' . $subject_list['grade_id'];
            $grade = mysqli_fetch_assoc(mysqli_query($conn, $query3));
        ?>
            <tr class="md:p-10 p-[2%] text-stone-900 w-[100%] border-collapse">
                <td class="md:p-4 md:px-10 px-3 border-2 border-solid border-gray-100 text-slate-200 md:text-sm text-[0.5em]"><?= $subject_list['subject_id'] ?></td>
                <td class="md:p-4 md:px-10 px-3 border-2 border-solid border-gray-100 text-slate-200 md:text-sm text-[0.5em]"><?= $subject_list['name'] ?></td>
                <td class="md:p-4 md:px-10 px-3 border-2 border-solid border-gray-100 text-slate-200 md:text-sm text-[0.5em]"><?= $te['name'] ?></td>
                <td class="md:p-4 md:px-10 px-3 border-2 border-solid border-gray-100 text-slate-200 md:text-sm text-[0.5em]"><?= $grade['name'] ?></td>
                <td class="p-4 bg-slate-200">
                    <div class="flex flex-col justify-center items-center">
                        <div class="text-green-800 block h-6 p-3 m-3">

                            <a href="./updateSubject.php?su=<?= $subject_list['subject_id'] ?>"><i class="fa fa-lg fa-exchange "></i> </a>
                        </div>
                        <div class="text-red-700 block h-6 p-3 m-3">
                            <a href="delSubject.php?su=<?= $subject_list['subject_id'] ?>"> <i class="fa fa-lg fa-trash-can "></i></a>
                        </div>
                    </div>
                    </form>

                </td>

            </tr>

        <?php

        } ?>
    </table>

</div>