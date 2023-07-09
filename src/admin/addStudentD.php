<?php
include '../db/connection.php';


$attr = array(
    'ID',
    'NAME',
    'EMAIL',
    'PASSWORD',
    'DOB',
    'SEX',
    'ADDRESS',
    'PHONE',
    'DOJ'
);
$parent = array('pname', 'pemail', 'pphone');
if (isset($_POST['submit'])) {
    $q =   "insert into parent values ('"
        . $_POST[$attr[0]] . "', '"
        . $_POST[$parent[0]] . "', '"
        . $_POST[$parent[1]] . "', '"
        . $_POST[$parent[2]] . "'); ";

    $q2 = "insert into student values ('"
        . $_POST[$attr[0]] . "', '"
        . $_POST[$attr[1]] . "', '"
        . $_POST[$attr[2]] . "', '"
        . $_POST[$attr[3]] . "', '"
        . $_POST[$attr[4]] . "', '"
        . $_POST[$attr[5]] . "', '"
        . $_POST[$attr[6]] . "', '"
        . $_POST[$attr[7]] . "', '"
        . $_POST[$attr[8]] . "', '"
        . $_POST[$attr[0]] . "')";
    mysqli_query($conn, $q);
    mysqli_query($conn, $q2);
    echo "<script>  window.location.replace('./studentDash.php');</script>";
}
?>
<dialog open class="overflow-y-visible relative top-3 z-20 w-[100%] overflow-x-hidden flex flex-col justify-start items-center bg-white bg-opacity-30 backdrop-blur-sm h-screen">
    <div class=' md:top-16 md:bottom-auto md:bottom-auto bottom-[30%]    right-11 absolute bg-red-900 p-3 rounded-lg flex justify-center items-center w-36 cursor-pointer text-slate-200 text-sm' onclick="  window.location.replace('./studentDash.php');">DISCARD</div>
    <div class='flex flex-col justify-center items-center  m-4'>
        <img src="../resource/std_av.png" width="130" alt="" class="bg-stone-900 rounded-2xl  z-10">
        <h1 class="mt-4">New Student</h1>
    </div>
    <form method="post" class=" w-[100%]  h-screen flex flex-col flex-wrap justify-center items-center ">
        <table class="bg-white border-2 border-solid border-black border-collapse shadow-gray-600 rounded-2xl">
            <tr>
                <th class="p-3 md:px-24 text-sm bg-stone-900 text-white"><?= $attr[0] ?></th>
                <td class="p-3 md:px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="text" name='<?= $attr[0] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 md:px-24 text-sm bg-stone-900 text-white"><?= $attr[1] ?></th>
                <td class="p-3 md:px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="text" name='<?= $attr[1] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 md:px-24 text-sm bg-stone-900 text-white"><?= $attr[2] ?></th>
                <td class="p-3 md:px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="email" name='<?= $attr[2] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 md:px-24 text-sm bg-stone-900 text-white"><?= $attr[3] ?></th>
                <td class="p-3 md:px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="password" name='<?= $attr[3] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 md:px-24 text-sm bg-stone-900 text-white"><?= $attr[4] ?></th>
                <td class="p-3 md:px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="date" name='<?= $attr[4] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 md:px-24 text-sm bg-stone-900 text-white"><?= $attr[5] ?></th>
                <td class="p-3 md:px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="text" name='<?= $attr[5] ?>'></td>
            </tr>
        </table>
        <table class="bg-white border-2 border-solid border-black border-collapse shadow-gray-600 rounded-2xl">
            <tr>
                <th class="p-3 md:px-24 text-sm bg-stone-900 text-white"><?= $attr[6] ?></th>
                <td class="p-3 md:px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="text" name='<?= $attr[6] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 md:px-24 text-sm bg-stone-900 text-white"><?= $attr[7] ?></th>
                <td class="p-3 md:px-24 border-2 border-solid border-stone-900"><input type="phone" class="h-12 w-[100%]" name='<?= $attr[7] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 md:px-24 text-sm bg-stone-900 text-white"><?= $attr[8] ?></th>
                <td class="p-3 md:px-24 border-2 border-solid border-stone-900"><input type="date" class="h-12 w-[100%]" name='<?= $attr[8] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 md:px-24 text-sm bg-stone-900 text-white">Parent Name</th>
                <td class="p-3 md:px-24 border-2 border-solid border-stone-900"><input required type="text" class="h-12 w-[100%]" name="<?= $parent[0] ?>"></td>
            </tr>
            <tr>
                <th class="p-3 md:px-24 text-sm bg-stone-900 text-white">Parent Email</th>
                <td class="p-3 md:px-24 border-2 border-solid border-stone-900"><input required type="email" class="h-12 w-[100%]" name="<?= $parent[1] ?>"></td>
            </tr>
            <tr>
                <th class="p-3 md:px-24 text-sm bg-stone-900 text-white">Parent Phone</th>
                <td class="p-3 md:px-24 border-2 border-solid border-stone-900"><input type="tel" class="h-12 w-[100%]" name="<?= $parent[2] ?>"></td>
            </tr>
        </table>
        <div class=' md:top-16 md:bottom-auto bottom-[30%]   right-52 absolute bg-stone-900 p-3 rounded-lg flex justify-center items-center w-36 cursor-pointer text-slate-200 text-sm'><input name='submit' type="submit" value="ADD STUDENT"></div>

    </form>
</dialog>