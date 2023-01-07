<?php
    include '../db/connection.php';
    $queryt = mysqli_query($conn,'select * from classroom left join grade using(grade_id);');;
    ?>
<script src="./scripts/students.js"></script>
<div class=" flex flex-col items-center justify-center translate-y-32 translate-x-[20%]  w-[80%] overflow-x-hidden">
<div class="flex justify-between items-center w-[90%]">

<div class="flex flex-col flex-wrap ml-20 ">
<form class='flex flex-row justify-start items-center w-[40%]' method="post">
<input type="text" name="query" placeholder='Subject ID' id="number" class=" shadow-lg shadow-gray-700 bg-gradient-to-r to-slate-900 from-blue-900 rounded-tl-lg rounded-bl-lg w-96 h-10 p-3  text-slate-200 border-3 border-black">
<input type="submit" name="submit" value="search" class="shadow-lg shadow-gray-700 bg-stone-900 p-3 rounded-br-lg translate-x-[-20%] rounded-tr-lg flex justify-center items-center w-36 text-slate-200 text-sm add-Teacher">
</form>
<form action="" class="flex flex-row justify-start items-center w-[40%] mt-5" method='post'>
<select class="bg-gradient-to-r to-slate-900 from-blue-900 shadow-lg shadow-gray-700 text-slate-200 rounded-bl-lg rounded-tl-lg w-96 h-10 p-3" name='classes'>
                    <?php

                    while($qt = mysqli_fetch_assoc($queryt)){ ?>
                    <option class="text-blue-900 " value="<?= $qt['classroom_id']?>"><?= $qt['classroom_id']?> - <?= $qt['name'] ?> - <?= $qt['section']?></option>
                    <?php } ?>
                    
                </select>  
</select>
<input type="submit" name="submitc" value="search" class="shadow-lg shadow-gray-700 bg-stone-900 p-3 rounded-br-lg  rounded-tr-lg flex justify-center items-center w-36 text-slate-200 text-sm add-Teacher">

</form>
</div>
<div class="flex flex-col width-[30%]">
<div class='   bg-stone-900 p-3 rounded-lg flex justify-center items-center w-[100%] text-slate-200 text-sm add-Teacher'><a href="./addSubject.php">ADD SUBJECT</a></div><br>
<div class='   bg-stone-900 p-3 rounded-lg flex justify-center items-center w-[100%] text-slate-200 text-sm add-Teacher'><a href="./addSubject.php">ADD SUBJECT</a></div>
</div>
</div>
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
        if(isset($_POST['submit']) && $_POST['query'] == '' || isset($_POST['submitc']) && $_POST['classes'] == ''){

            $query = 'select * from student';
            $query = mysqli_query($conn, $query);
        }
        elseif(!isset($_POST['submit']) || !isset($_POST['submitc'])){

            $query = 'select * from student';
            $query = mysqli_query($conn, $query);
        }
        else{
            if(isset($_POST['submit']) && $_POST['query']){
                $query = 'select * from student where student_id = ' . $_POST['query'];
                $query = mysqli_query($conn, $query);}
                elseif(isset($_POST['submitc']) && $_POST['classes']){
                    $q = "select * from classroom_student where classroom _id ='" . $_POST['classes'] . "';";
                    $query = 'select * from student where student_id = ' . $_POST['query'] . 'right join grade using(grade_id)';
                    $query = mysqli_query($conn, $query);
                }
        }
    while($student_list = mysqli_fetch_assoc($query))
    {

    
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

            <div  class="text-green-800 block h-6 p-3 m-3">
                    
            <a href="./updateStudent.php?st=<?= $student_list['student_id']?>"><i class="fa fa-lg fa-exchange "></i> </a>
                    </div>
                    <div   class="text-red-700 block h-6 p-3 m-3">
                    <a href="delStudent.php?st=<?= $student_list['student_id']?>"> <i class="fa fa-lg fa-trash-can "></i></a>
                    </div> 

        </td>

    </tr>
   
    <?php 

}?>

</table>

</div>


