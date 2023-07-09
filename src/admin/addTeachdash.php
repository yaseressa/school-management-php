<?php
$attr = array(
    'ID',
    'EMAIL',
    'NAME',
    'PHONE'

);

?>

<dialog open class="overflow-y-visible relative top-3 z-20 w-[100%] overflow-x-hidden flex flex-col justify-start items-center bg-white bg-opacity-30 backdrop-blur-sm h-screen">
    <div class=' md:top-16 md:bottom-auto  bottom-[30%]    right-11 absolute bg-red-900 p-3 rounded-lg flex justify-center items-center w-36 cursor-pointer text-slate-200 text-sm' onclick="  window.location.replace('./teachDash.php');">DISCARD</div>
    <div class='flex flex-col justify-center items-center z-20 m-10'><img src="../resource/teacher-av.png" width="130" alt="" class="bg-stone-900 rounded-2xl  z-10">
        <h1>New Teacher</h1>
    </div>
    <form method="post" class=" w-[100%] flex flex-wrap justify-center items-start ">
        <table class="bg-white h-[70%]">
            <tr class="w-full">
                <th class="p-3 px-24 text-sm bg-stone-900 text-white w-[30%]"><?= $attr[0] ?></th>
                <td class="p-3 border-2 border-solid border-stone-900 w-[70%]"><input required class="h-12 w-[100%]" type="text" name='<?= $attr[0] ?>'></td>
            </tr>
            <tr class="w-full">
                <th class="p-3 px-24 text-sm bg-stone-900 text-white w-[30%]"><?= $attr[1] ?></th>
                <td class="p-3 border-2 border-solid border-stone-900 w-[70%]"><input required class="h-12 w-[100%]" type="email" name='<?= $attr[1] ?>'></td>
            </tr>

            <tr class="w-full">
                <th class="p-3 px-24 text-sm bg-stone-900 text-white w-[30%]"><?= $attr[2] ?></th>
                <td class="p-3 border-2 border-solid border-stone-900 w-[70%]"><input required class="h-12 w-[100%]" type="text" name='<?= $attr[2] ?>'></td>
            </tr>
            <tr class="w-full">
                <th class="p-3 px-24 text-sm bg-stone-900 text-white w-[30%]"><?= $attr[3] ?></th>
                <td class="p-3 border-2 border-solid border-stone-900 w-[70%]"><input required class="h-12 w-[100%]" type="text" name='<?= $attr[3] ?>'></td>
            </tr>




        </table>
        <div class='md:top-16 md:bottom-auto  right-52 md:absolute bg-stone-900 p-3 rounded-lg flex justify-center items-center w-36 cursor-pointer text-slate-200 text-sm'><input name='submit' type="submit" value="ADD TEACHER"></div>
    </form>

</dialog>

<?php
include '../db/connection.php';
if (isset($_POST['submit'])) {

    $q2 = "insert into teacher values ('"
        . $_POST[$attr[0]] . "', '"
        . $_POST[$attr[1]] . "', '"
        . $_POST[$attr[2]] . "', '"
        . $_POST[$attr[3]] . "')";
    mysqli_query($conn, $q2);
    echo "<script>  window.location.replace('./teachDash.php');</script>";
}

?>