<?php
$attr = array(	
'EID',
'SID',
'SUBID',
'MARKS'

);



?>

<div class=" flex flex-col items-center justify-center translate-y-28 translate-x-80  w-[80%] overflow-x-hidden h-[100%]">
<div class='flex flex-col justify-center items-center z-20 m-10'><img src="../resource/exam-av.png" width="130" alt="" class="bg-stone-900 rounded-full  z-10"><h1>New Result</h1></div>
<form action="" method="post" class=" w-[100%]  overflow-y-hidden flex flex-col justify-center items-center z-10">
    <table class="bg-white border-2 border-solid border-black border-collapse shadow-gray-600 rounded-2xl">
    <tr>
            <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[0]?></th>
            <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required type="number" class="h-12 w-[100%]" name="<?= $attr[0]?>" ></td>
        </tr>
        <tr>
            <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[1]?></th>
            <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required type="number" class="h-12 w-[100%]"  name="<?= $attr[1]?>" ></td>
        </tr>
        <tr>
            <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[2]?></th>
            <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required type="number" class="h-12 w-[100%]"  name="<?= $attr[2]?>" ></td>
        </tr>
        <tr>
            <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[3]?></th>
            <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required type="number" class="h-12 w-[100%]"  name="<?= $attr[3]?>" ></td>
        </tr>

        
 



    </table>
    <div class=' mt-6 bg-stone-900 p-3 rounded-lg flex justify-center items-center w-36 text-slate-200 text-sm'><input name='submit'type="submit" value="ADD"></div>
</form>

</div>

<?php
include '../db/connection.php';
if(isset($_POST['submit'])){
$q2 = "insert into result values('"
 . $_POST[$attr[0]] . "',  '" 
 . $_POST[$attr[1]] . "', '" 
 . $_POST[$attr[2]] . "', '" 
 . $_POST[$attr[3]] . "');";
mysqli_query($conn, $q2);

}

?>
