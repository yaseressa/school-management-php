<?php
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
?>
<div class="overflow-y-visible translate-y-28 translate-x-80  w-[80%] overflow-x-hidden">
    <div class='flex flex-col justify-center items-center z-20 m-10'><img src="../resource/std_av.png" width="130" alt="" class="bg-stone-900 rounded-full  z-10">
        <h1>New Student</h1>
    </div>
    <form action="" method="post" class=" w-[100%]   flex flex-col justify-center items-center z-10">
        <table class="bg-white border-2 border-solid border-black border-collapse shadow-gray-600 rounded-2xl">
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[0] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="text" name='<?= $attr[0] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[1] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="text" name='<?= $attr[1] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[2] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="email" name='<?= $attr[2] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[3] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="password" name='<?= $attr[3] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[4] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="date" name='<?= $attr[4] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[5] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="text" name='<?= $attr[5] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[6] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="text" name='<?= $attr[6] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[7] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input type="phone" class="h-12 w-[100%]" name='<?= $attr[7] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[8] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input type="date" class="h-12 w-[100%]" name='<?= $attr[8] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $parent[0] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required type="text" class="h-12 w-[100%]" name='<?= $parent[0] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $parent[1] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required type="email" class="h-12 w-[100%]" name='<?= $parent[1] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $parent[2] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input type="tel" class="h-12 w-[100%]" name='<?= $parent[2] ?>'></td>
            </tr>



        </table>
        <div class=' mt-6 bg-stone-900 p-3 rounded-lg flex justify-center items-center w-36 text-slate-200 text-sm'><input name='submit' type="submit" value="ADD STUDENT"></div>
    </form>
</div>

<?php
include '../db/connection.php';
if (isset($_POST['submit'])) {
    $q =   "insert into parent values ('"
        . $_POST[$attr[0]] . "', '"
        . $_POST['pname'] . "', '"
        . $_POST['pphone'] . "', '"
        . $_POST['pemail'] . "'); ";
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
    header_remove('Location');
}

?>