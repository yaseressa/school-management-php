<?php
$attr = array('ID',	
'EMAIL',
'NAME',	
'PHONE'

);
if(isset($_GET['tc'])){
    include '../db/connection.php';
    $teacher = mysqli_fetch_assoc(mysqli_query($conn,"select * from teacher where teacher_id = '" . $_GET['tc'] . "'"));

}

?>

<div class=" flex flex-col items-center justify-center translate-y-28 translate-x-80  w-[80%] overflow-x-hidden h-[100%]">
<div class='flex flex-col justify-center items-center z-20 m-10'><img src="../resource/std_av.png" width="130" alt="" class="bg-stone-900 rounded-full  z-10"><h1>New Teacher</h1></div>
<form action="" method="post" class=" w-[100%]  overflow-y-hidden flex flex-col justify-center items-center z-10">
    <table class="bg-white border-2 border-solid border-black border-collapse shadow-gray-600 rounded-2xl">
        <tr>
            <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[0]?></th>
            <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="text" value="<?= $teacher['teacher_id']?>" name='<?= $attr[0]?>'></td>
        </tr>
        <tr>
            <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[1]?></th>
            <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="email" value="<?= $teacher['email']?>" name='<?= $attr[1]?>'></td>
        </tr>
        <tr>
            <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[2]?></th>
            <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="text" value="<?= $teacher['name']?>" name='<?= $attr[2]?>'></td>
        </tr>
        <tr>
            <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[3]?></th>
            <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="number" value="<?= $teacher['phone']?>" name='<?= $attr[3]?>'></td>
        </tr>
 



    </table>
    <div class=' mt-6 bg-stone-900 p-3 rounded-lg flex justify-center items-center w-36 text-slate-200 text-sm'><input name='submit'type="submit" value="UPDATE"></div>
</form>

</div>

<?php
include '../db/connection.php';
if(isset($_POST['submit'])){

$q2 = "update teacher set teacher_id = '"
 . $_POST[$attr[0]] . "', email = '" 
 . $_POST[$attr[1]] . "', name = '"
 . $_POST[$attr[2]] . "', phone = '"
 . $_POST[$attr[3]] . "' where teacher_id =" . $_POST[$attr[0]];
mysqli_query($conn, $q2);
header_remove('Location');
}

?>
