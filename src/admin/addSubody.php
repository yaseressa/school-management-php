<?php
$attr = array(
    'ID',
    'SUBJECT',
    'GRADE ID',
    'TEACHER ID'

);

include '../db/connection.php';
$querg = mysqli_query($conn, 'select * from grade;');
$queryt = mysqli_query($conn, 'select teacher_id, name from teacher;');


?>

<dialog open class="overflow-y-visible relative top-3 z-20 w-[100%] overflow-x-hidden flex flex-col justify-start items-center bg-white bg-opacity-30 backdrop-blur-sm h-screen">
    <div class=' md:top-16 md:bottom-auto bottom-[30%] right-11 absolute bg-red-900 p-3 rounded-lg flex justify-center items-center w-36 cursor-pointer text-slate-200 text-sm' onclick="  window.location.replace('./subjectDash.php');">DISCARD</div>
    <div class='flex flex-col justify-center items-center z-20 m-10'><img src="../resource/subject-av.png" width="130" alt="" class="bg-orange-700 rounded-2xl  z-10">
        <h1>New subject</h1>
    </div>
    <form action="" method="post" class=" w-[100%]  overflow-y-visible overflow-x-hidden flex flex-col justify-center items-center z-10">
        <table class="bg-white border-2 border-solid border-black border-collapse shadow-gray-600 rounded-2xl">
            <tr>
                <th class="p-3 md:px-24 text-sm bg-orange-700 text-white"><?= $attr[0] ?></th>
                <td class="p-3 md:px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="text" name='<?= $attr[0] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 md:px-24 text-sm bg-orange-700 text-white"><?= $attr[1] ?></th>
                <td class="p-3 md:px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="text" name='<?= $attr[1] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 md:px-24 text-sm bg-orange-700 text-white"><?= $attr[2] ?></th>
                <td class="p-3 md:px-24 border-2 border-solid border-stone-900">
                    <select class="h-12 w-[100%]" name='grade'>
                        <?php

                        while ($q = mysqli_fetch_assoc($querg)) { ?>
                            <option value="<?= $q['grade_id'] ?>"><?= $q['name'] ?></option>
                        <?php } ?>

                    </select>
                </td>
            </tr>
            <tr>
                <th class="p-3 md:px-24 text-sm bg-orange-700 text-white"><?= $attr[3] ?></th>
                <td class="p-3 md:px-24 border-2 border-solid border-stone-900">
                    <select class="h-12 w-[100%]" name='teacher'>
                        <?php
                        while ($qt = mysqli_fetch_assoc($queryt)) { ?>
                            <option value="<?= $qt['teacher_id'] ?>"><?= $qt['name'] ?></option>
                        <?php } ?>

                    </select>
                </td>
            </tr>




        </table>
        <div class=' md:top-16 md:bottom-auto bottom-[30%]   right-52 absolute bg-orange-700 p-3 rounded-lg flex justify-center items-center w-36 cursor-pointer text-slate-200 text-sm'><input name='submit' type="submit" value="ADD SUBJECT"></div>
    </form>

    </div>

    <?php
    include '../db/connection.php';
    if (isset($_POST['submit'])) {

        $q2 = "insert into subject values('"
            . $_POST[$attr[0]] . "', '"
            . $_POST[$attr[1]] . "', '"
            . $_POST['grade'] . "', '" . "', '"
            . $_POST['teacher'] . "' );";
        mysqli_query($conn, $q2);
        echo "<script>window.location.replace(' ./subjectDash.php');</script>";
    }

    ?>