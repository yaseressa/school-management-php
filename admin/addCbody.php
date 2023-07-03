<?php
$attr = array(
    'CLASSROOM ID',
    'GRADE',
    'SECTION',
    'STATUS'

);

include '../db/connection.php';
$querg = mysqli_query($conn, 'select * from grade;');


?>

<dialog open class="overflow-y-visible z-20 w-[100%] overflow-x-hidden flex flex-col justify-center items-center bg-white bg-opacity-30 backdrop-blur-sm h-screen">
    <div class=' top-16 right-12 absolute bg-red-900 p-3 rounded-lg flex justify-center items-center w-36 cursor-pointer text-slate-200 text-sm' onclick="window.location.replace(' /classDash.php');">DISCARD</div>
    <div class='flex flex-col justify-center items-center z-20 m-10'><img src="../resource/class-av.png" width="130" alt="" class="bg-black rounded-2xl  z-10">
        <h1>New Class</h1>
    </div>
    <form action="" method="post" class=" w-[100%]  overflow-y-hidden flex flex-col justify-center items-center z-10">
        <table class="bg-white border-2 border-solid border-black border-collapse shadow-gray-600 rounded-2xl">
            <tr>
                <th class="p-3 px-24 text-sm bg-black text-white"><?= $attr[0] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="number" name="ID"></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-black text-white"><?= $attr[1] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900">
                    <select class="h-12 w-[100%]" name='<?= $attr[1] ?>'>
                        <?php

                        while ($q = mysqli_fetch_assoc($querg)) { ?>
                            <option value="<?= $q['grade_id'] ?>"><?= $q['name'] ?></option>
                        <?php } ?>

                    </select>
                </td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-black text-white"><?= $attr[2] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="text" name='<?= $attr[2] ?>'></td>
            </tr>







        </table>
        <div class=' top-16 right-52 absolute bg-black p-3 rounded-lg flex justify-center items-center w-36 cursor-pointer text-slate-200 text-sm'><input name='submit' type="submit" value="ADD CLASS"></div>
    </form>

</dialog>

<?php
include '../db/connection.php';
if (isset($_POST['submit'])) {

    $q2 = "insert into classroom values('"
        . $_POST["ID"] . "', '"
        . $_POST[$attr[1]] . "', '"
        . $_POST[$attr[2]] . "', '"
        . "0" . "' );";
    mysqli_query($conn, $q2);
    echo "<script>window.location.replace(' /classDash.php');</script>";
}

?>