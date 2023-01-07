<?php
$attr = array('ID',	
'NAME',
'EMAIL',	
'PASSWORD',	
'DOB',	
'SEX',	
'ADDRESS',	
'PHONE'	,
'DOJ'
);
$parent = array('pname', 'pemail', 'pphone');
session_start();
if(isset($_GET['st'])){
    include '../db/connection.php';
    $student = mysqli_fetch_assoc(mysqli_query($conn,"select * from student where student_id = '" . $_GET['st'] . "'"));
    $parent_t = mysqli_fetch_assoc(mysqli_query($conn,"select * from parent where parent_id = '" . $_GET['st'] . "'"));
}else{
    header_remove('Location');
}
?>
<div class=" flex flex-col items-center justify-center translate-y-28 translate-x-80  w-[80%] overflow-x-hidden h-[100%]">
<div class='flex flex-col justify-center items-center z-20 m-10'><img src="../resource/std_av.png" width="130" alt="" class="bg-stone-900 rounded-full  z-10"><h1><?= $student['name']?></h1></div>
<form action="" method="post" class=" w-[100%]  overflow-y-hidden flex flex-col justify-center items-center z-10">
    <table class="bg-white border-2 border-solid border-black border-collapse shadow-gray-600 rounded-2xl">
        <tr>
            <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[0]?></th>
            <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" value="<?= $student['student_id']?>" type="text" name='<?= $attr[0]?>'></td>
        </tr>
        <tr>
            <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[1]?></th>
            <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" value="<?= $student['name']?>" type="text" name='<?= $attr[1]?>'></td>
        </tr>
        <tr>
            <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[2]?></th>
            <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="email"value="<?= $student['email']?>" name='<?= $attr[2]?>'></td>
        </tr>
        <tr>
            <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[3]?></th>
            <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="password" value="<?= $student['password']?>" name='<?= $attr[3]?>'></td>
        </tr>
        <tr>
            <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[4]?></th>
            <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="date" value="<?= $student['dob']?>" name='<?= $attr[4]?>'></td>
        </tr>
        <tr>
            <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[5]?></th>
            <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="text" value="<?= $student['sex']?>" name='<?= $attr[5]?>'></td>
        </tr>
        <tr>
            <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[6]?></th>
            <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="text" value="<?= $student['Address']?>" name='<?= $attr[6]?>'></td>
        </tr>
        <tr>
            <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[7]?></th>
            <td class="p-3 px-24 border-2 border-solid border-stone-900"><input type="phone" class="h-12 w-[100%]" value="<?= $student['phone']?>" name='<?= $attr[7]?>'></td>
        </tr>
        <tr>
            <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[8]?></th>
            <td class="p-3 px-24 border-2 border-solid border-stone-900"><input type="date" class="h-12 w-[100%]" value="<?= $student['date_of_join']?>" name='<?= $attr[8]?>'></td>
        </tr>
        <tr>
            <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $parent[0]?></th>
            <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required type="text" class="h-12 w-[100%]" value="<?= $parent_t['name']?>" name='<?= $parent[0]?>'></td>
        </tr>
        <tr>
            <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $parent[1]?></th>
            <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required type="email" class="h-12 w-[100%]" value="<?= $parent_t['email']?>" name='<?= $parent[1]?>'></td>
        </tr>
        <tr>
            <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $parent[2]?></th>
            <td class="p-3 px-24 border-2 border-solid border-stone-900"><input type="phone" class="h-12 w-[100%]" value="<?= $parent_t['phone']?>" name='<?= $parent[2]?>'></td>
        </tr>



    </table>
    <a href="./studentDash.php" class=' mt-6  bg-stone-900 p-3 rounded-lg flex justify-center items-center w-36 text-slate-200 text-sm'><div class=''><input name='submit'type="submit" value="UPDATE STUDENT"></div></a>
</form>
</div>

<?php
include '../db/connection.php';
if(isset($_POST['submit'])){
$q =   "update parent set parent_id = '" . $_POST[$attr[0]] . "', name = '"  . $_POST['pname'] . "', phone = '" . $_POST['pphone'] . "', email = '" . $_POST['pemail'] . "' where parent_id = '" . $_POST[$attr[0]] . "'";
$q2 = "update student set student_id = '"
 . $_POST[$attr[0]] . "', name = '" 
 . $_POST[$attr[1]] . "', email = '"
 . $_POST[$attr[2]] . "', password = '"
 . $_POST[$attr[3]] . "', dob = '"
 . $_POST[$attr[4]] . "', sex = '"
 . $_POST[$attr[5]] . "', address = '"
 . $_POST[$attr[6]] . "', phone = '"
 . $_POST[$attr[7]] . "', date_of_join = '"
 . $_POST[$attr[8]] . "', parent_id = '" 
 . $_POST[$attr[0]] . "' where student_id = '" . $_POST[$attr[0]] . "'";;
mysqli_query($conn, $q);
mysqli_query($conn, $q2);

}

?>