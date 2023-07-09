<?php
include '../db/connection.php';
$queryt = mysqli_query($conn, 'select * from classroom left join grade using(grade_id);');;
?>
<script src="./scripts/students.js"></script>
<div class=" flex flex-col items-center justify-center translate-y-32 md:translate-x-[20%]  md:w-[80%] overflow-x-hidden">
    <div class="flex md:flex-row flex-col w-[80%] justify-center items-center w-full">

        <div class="flex flex-col flex-wrap ml-20 w-full">
            <form action="" class="flex flex-row whitespace-nowrap justify-start items-center w-[70%]" method='post'>
                <select value='CHOOSE A CLASS' class="bg-gradient-to-r to-slate-900 from-blue-900 shadow-lg shadow-gray-700 text-slate-200 rounded-bl-lg rounded-tl-lg w-[100%] h-11 p-3" name='classes'>
                    <option value="" class="text-gray-600">CHOOSE A CLASSROOM</option>
                    <?php

                    while ($qt = mysqli_fetch_assoc($queryt)) { ?>
                        <option class="text-blue-900 " value="<?= $qt['classroom_id'] ?>"><?= $qt['classroom_id'] ?> - <?= $qt['name'] ?> - <?= $qt['section'] ?></option>
                    <?php } ?>

                </select>
                </select>
                <input type="submit" name="submitc" value="search" class="shadow-lg shadow-gray-700 bg-stone-900 p-3 rounded-br-lg  rounded-tr-lg flex justify-center items-center w-[25%] text-slate-200 text-sm add-Teacher">

            </form>
            <form class='flex flex-row whitespace-nowrap justify-start mt-5 items-center w-[70%]' method="post">
                <input type="text" name="query" placeholder='Student ID' id="number" class=" bg-gradient-to-r to-slate-900 from-blue-900 shadow-lg shadow-gray-700 text-slate-200 rounded-bl-lg rounded-tl-lg w-[100%] h-11 p-3">
                <input type="submit" name="submit" value="search" class="shadow-lg shadow-gray-700 bg-stone-900 p-3 rounded-br-lg  rounded-tr-lg flex justify-center items-center w-[25%] text-slate-200 text-sm add-Teacher">
            </form>
        </div>
        <div class="flex flex-col width-[40%]">
            <div class='   bg-stone-900 p-4 rounded-lg flex justify-center items-center  text-slate-200 text-sm add-Teacher w-full whitespace-nowrap'><a href="./addClass.php">ADD &nbsp;CLASS</a></div><br>
            <div class='   bg-stone-900 p-4 rounded-lg flex justify-center items-center  text-slate-200 text-sm add-Teacher w-full whitespace-nowrap'><a href="./addStudentClass.php">ADD &nbsp;STUDENT</a></div>
        </div>
    </div>
    <?php if (isset($_POST['submitc'])) { ?>
        <div class="translate-y-12 mt-20 flex flex-row justify-between items-center">
            <div class="text-red-700 block ">
                <a href="delClassbody.php?cl=<?= $_POST['classes'] ?>" onclick="return confirm('do you want to delete this class and all its students?')"> <i class="fa fa-lg fa-trash-can "></i></a>
            </div>
            <h1 class="px-12 border-1 border-red-700 border-solid rounded-3xl">CLASSROOM: <?= $_POST['classes'] ?></h1>
        </div>

    <?php } ?>
    <table class="bg-white border-2 border-solid border-black border-collapse shadow-gray-600 mt-16 ml-16 rounded-2xl bg-gradient-to-b from-slate-900 to-blue-900">

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
        if (isset($_POST['submit']) && $_POST['query'] == '' || isset($_POST['submitc']) && $_POST['classes'] == '') {

            $query = 'select * from student';
            $query = mysqli_query($conn, $query);
        } elseif (!isset($_POST['submit']) && !isset($_POST['submitc'])) {

            $query = 'select * from student';
            $query = mysqli_query($conn, $query);
        } else {
            if (isset($_POST['submit']) && $_POST['query']) {
                $query = 'select * from student where student_id = ' . $_POST['query'];
                $query = mysqli_query($conn, $query);
            } elseif (isset($_POST['submitc']) && $_POST['classes']) {
                $q = "select * from classroom_student join student using(student_id) where classroom_id ='" . $_POST['classes'] . "'";
                $query = mysqli_query($conn, $q);
            } else {
                $q = "select * from classroom_student join student using(student_id) where classroom_id ='" . $_POST['classes'] . "' AND student_id = '" . $_POST['query'] . "'";
                $query = mysqli_query($conn, $q);
            }
        }

        while ($student_list = mysqli_fetch_assoc($query)) {


        ?>
            <tr class="border-collapse md:p-10 p-[2%] text-stone-900 w-[100%] ">

                <td class=" border-2 px-4 p-4 border-solid border-gray-100 text-slate-200 text-sm"><?= $student_list['student_id'] ?></td>
                <td class=" border-2 px-4 p-4 border-solid border-gray-100 text-slate-200 text-sm"><?= $student_list['name'] ?></td>
                <td class=" border-2 px-4 p-4 border-solid border-gray-100 text-slate-200 text-sm"><?= $student_list['email'] ?></td>
                <td class=" border-2 px-4 p-4 border-solid border-gray-100 text-slate-200"><?= $student_list['password'] ?></td>
                <td class=" border-2 px-4 p-4  border-solid border-gray-100 text-slate-200 text-xs"><?= $student_list['dob'] ?></td>
                <td class=" border-2 px-4 p-4 border-solid border-gray-100 text-slate-200"><?= $student_list['sex'] ?></td>
                <td class=" border-2 px-4 p-4 border-solid border-gray-100 text-slate-200 text-sm"><?= $student_list['Address'] ?></td>
                <td class=" border-2 px-4 p-4 border-solid border-gray-100 text-slate-200"><?= $student_list['phone'] ?></td>
                <td class=" border-2 px-4 p-4 border-solid border-gray-100 text-slate-200 text-sm"><?= $student_list['date_of_join'] ?></td>
                <?php if (isset($student_list['classroom_id'])) { ?>
                    <td class="p-4 bg-slate-200">

                        <div class="text-green-800 block h-6 p-3 m-3">

                            <a href="./updateClassS.php?st=<?= $student_list['student_id'] ?>&cs=<?= $student_list['classroom_id'] ?>"><i class="fa fa-lg fa-exchange "></i> </a>
                        </div>
                        <div class="text-red-700 block h-6 p-3 m-3">
                            <a href="delClassSbody.php?st=<?= $student_list['student_id'] ?>" onclick="return confirm('do you want to delete this student from this class?')"> <i class="fa fa-lg fa-trash-can "></i></a>
                        </div>

                    </td>
                <?php } ?>
            </tr>

        <?php

        } ?>

    </table>

</div>