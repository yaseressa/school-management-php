<?php
$attr = array(
    'GRADE',
    'STUDENT'

);

include '../db/connection.php';
if (isset($_GET['cs']) && $_GET['st']) {
    $cs = mysqli_fetch_assoc(mysqli_query($conn, "select * from classroom where classroom_id = '" . $_GET['cs'] . "'"));
    $st = mysqli_fetch_assoc(mysqli_query($conn, "select * from student where student_id = '" . $_GET['st'] . "'"));
    $querg = mysqli_query($conn, 'select * from grade left join classroom using(grade_id);');
    $quert = mysqli_query($conn, "select * from student left join classroom_student using(student_id) where classroom_id IS NULL;");
}

?>

<dialog open class="overflow-y-visible z-20 w-[100%] overflow-x-hidden flex flex-col justify-center items-center bg-white bg-opacity-30 backdrop-blur-sm h-screen">
    <div class=' top-16 right-12 absolute bg-red-900 p-3 rounded-lg flex justify-center items-center w-36 cursor-pointer text-slate-200 text-sm' onclick="window.location.replace('http://localhost/SMS/admin/classDash.php');">DISCARD</div>
    <div class='flex flex-col justify-center items-center z-20 m-10'><img src="../resource/std_av.png" width="130" alt="" class="bg-stone-900 rounded-2xl  z-10">
        <h1>New subject</h1>
    </div>
    <form action="" method="post" class=" w-[100%]  overflow-y-hidden flex flex-col justify-center items-center z-10">
        <table class="bg-white border-2 border-solid border-black border-collapse shadow-gray-600 rounded-2xl">

            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[0] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900">
                    <select class="h-12 w-[100%]" name='GRADE'>
                        <?php

                        while ($q = mysqli_fetch_assoc($querg)) {
                            if ($cs == $q['classroom_id']) { ?>
                                <option value="<?= $q['classroom_id'] ?>" selected><?= $q['name'] ?> - <?= $q['section'] ?></option>
                            <?php } else { ?>
                                <option value="<?= $q['classroom_id'] ?>"><?= $q['name'] ?> - <?= $q['section'] ?></option>
                        <?php }
                        } ?>
                    </select>
                </td>
            </tr>
            </td>
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[1] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required type="text" class="h-12 w-[100%]" value="<?= $st["student_id"] ?>" name='<?= $attr[1] ?>' disabled></td>
            </tr>





        </table>
        <div class=' top-16 right-52 absolute bg-stone-900 p-3 rounded-lg flex justify-center items-center w-36 cursor-pointer text-slate-200 text-sm'><input name='submit' type="submit" value="UPDATE STUDENT'S CLASSROOM"></div>
    </form>

    </div>

    <?php
    include '../db/connection.php';
    if (isset($_POST['submit'])) {
        $q2 = "update classroom_student set classroom_id ='"
            . $_POST["GRADE"] . "', student_id = '"
            . $st["student_id"] . "';";
        mysqli_query($conn, $q2);
        echo "<script>window.location.replace('http://localhost/SMS/admin/classDash.php');</script>";
    }

    ?>