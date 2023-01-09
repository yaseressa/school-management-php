<?php
    include '../db/connection.php';
    ?>
<script src="./scripts/students.js"></script>
<div class=" flex flex-col items-center justify-center translate-y-32 translate-x-[20%]  w-[80%] overflow-x-hidden">
<div class="flex justify-between items-center w-[100%]">
<form class='m-4 flex flex-row justify-start items-center w-[100%] ml-10' method="post">
<input type="text" name="query" placeholder='Student ID' id="number" class=" shadow-lg shadow-gray-700 bg-gradient-to-r to-slate-900 from-blue-900 rounded-tl-lg rounded-bl-lg w-96 h-10 p-7  text-slate-200 border-3 border-black">
<input type="submit" name="submit" value="search" class="shadow-lg shadow-gray-700 bg-stone-900 p-5 rounded-br-lg translate-x-[-20%] rounded-tr-lg flex justify-center items-center w-36 text-slate-200 text-sm add-Teacher">
</form>
<div class='   bg-stone-900 p-3 rounded-lg flex justify-center items-center w-[30%] text-slate-200 text-sm add-Teacher'><a href="./addRes.php">ADD RESULT</a></div>

</div>
<table class="bg-white border-2 border-solid border-black border-collapse shadow-gray-600 mt-16 rounded-2xl bg-gradient-to-b from-slate-900 to-blue-900">
    <tr class=" text-stone-900">
        <th class="p-4 px-10 bg-stone-900 text-white">EXAM</th>
        <th class="p-4 px-10 bg-stone-900 text-white">STUDENT</th>
        <th class="p-4 px-10 bg-stone-900 text-white">SUBJECT</th>
        <th class="p-4 px-10 bg-stone-900 text-white">MARKS</th>


    </tr>
    <?php
        if(!isset($_POST['submit']) || $_POST['query'] == ''){
            $query = 'select student.name as student,student_id, subject_id,exam_id, exam.name as exam, marks, subject.name as subject from result join exam using(exam_id) join subject using(subject_id) join student using(student_id)';
            $query = mysqli_query($conn, $query);}
        else{
            $query = 'select student.name as student,student_id, subject_id,exam_id, exam.name as exam, marks, subject.name as subject from result join exam using(exam_id) join subject using(subject_id) join student using(student_id) where student_id = ' . $_POST['query'];
            $query = mysqli_query($conn, $query);
        }

    while($result_list = mysqli_fetch_assoc($query))
    {

    ?>
    <tr class="p-10 text-stone-900 w-[100%] border-collapse">
        <td class="p-4 px-10 border-2 border-solid border-gray-100 text-slate-200 text-sm"><?= $result_list['student'] ?></td>
        <td class="p-4 px-10 border-2 border-solid border-gray-100 text-slate-200 text-sm"><?= $result_list['exam'] ?></td>
        <td class="p-4 px-10 border-2 border-solid border-gray-100 text-slate-200"><?= $result_list['subject'] ?></td>
        <td class="p-4 px-10 border-2 border-solid border-gray-100 text-slate-200"><?= $result_list['marks'] ?></td>
        <td class="p-4 bg-slate-200">
            <div class="flex flex-col justify-center items-center">
            <?php if(isset($result_list['subject'])){?>  
            <div  class="text-green-800 block h-6 p-3 m-3">
                <a href="./updateRes.php?res=<?= $result_list['subject_id']?>&st=<?= $result_list['student_id']?>&ex=<?= $result_list['exam_id']?>" ><i class="fa fa-lg fa-exchange "></i> </a>
                </div>
                <div   class="text-red-700 block h-6 p-3 m-3">
                <a href="./delResult.php?res=<?= $result_list['subject_id']?>&st=<?= $result_list['student_id']?>&ex=<?= $result_list['exam_id']?>" onclick="confirm('proceed  deleting the result?')"> <i class="fa fa-lg fa-trash-can "></i></a>
                </div> 
                <?php }?>

            </div>             
            </form>
            
        </td>

    </tr>
   
    <?php 

}?>
</table>

</div>


