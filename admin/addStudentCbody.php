<?php
$attr = array(	
'GRADE',
'STUDENT'

);

    include '../db/connection.php';
    $querg = mysqli_query($conn, 'select * from grade left join classroom using(grade_id);');
    $quert = mysqli_query($conn, "select * from student left join classroom_student using(student_id) where classroom_id IS NULL;");


?>

<div class=" flex flex-col items-center justify-center translate-y-28 translate-x-80  w-[80%] overflow-x-hidden h-[100%]">
<div class='flex flex-col justify-center items-center z-20 m-10'><img src="../resource/subject-av.png" width="130" alt="" class="bg-stone-900 rounded-full  z-10"><h1>New subject</h1></div>
<form action="" method="post" class=" w-[100%]  overflow-y-hidden flex flex-col justify-center items-center z-10">
    <table class="bg-white border-2 border-solid border-black border-collapse shadow-gray-600 rounded-2xl">

        <tr>
            <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[0]?></th>
            <td class="p-3 px-24 border-2 border-solid border-stone-900">
                <select class="h-12 w-[100%]" name='GRADE'>
                    <?php

                    while($q = mysqli_fetch_assoc($querg)){ ?>
                    <option value="<?= $q['classroom_id']?>"><?= $q['name']?> - <?= $q['section']?></option>
                    <?php } ?>
                    
                </select>
            </td>
        </tr>
        <tr>
            <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[1]?></th>
            <td class="p-3 px-24 border-2 border-solid border-stone-900">
            <select class="h-12 w-[100%]" name='STUDENT'>
                    <?php
                    while($qt = mysqli_fetch_assoc($quert)){ ?>
                    <option value="<?= $qt['student_id']?>"><?= $qt['name']?></option>
                    <?php } ?>
                    
                </select>            </td>
        </tr>
 



    </table>
    <div class=' mt-6 bg-stone-900 p-3 rounded-lg flex justify-center items-center w-36 text-slate-200 text-sm'><input name='submit'type="submit" value="ADD"></div>
</form>

</div>

<?php
include '../db/connection.php';
if(isset($_POST['submit'])){
$q =mysqli_fetch_assoc(mysqli_query($conn,"select status from classroom where classroom_id = '" . $_POST["GRADE"] . "'")); 
$q1 = "insert into classroom(status) values('"
    . $q['status'] . "');";
$q2 = "insert into classroom_student values('"
 . $_POST["GRADE"] . "', '" 
 . $_POST["STUDENT"] . "' );";
mysqli_query($conn, $q2);
mysqli_query($conn, $q1);
}

?>
