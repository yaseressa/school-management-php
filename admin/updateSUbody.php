<?php
$attr = array(
    'ID',
    'SUBJECT',
    'GRADE ID',
    'TEACHER ID'

);
if (isset($_GET['su'])) {
    include '../db/connection.php';
    $subject = mysqli_fetch_assoc(mysqli_query($conn, "select * from subject where subject_id = '" . $_GET['su'] . "'"));
}

?>

<dialog open class="overflow-y-visible z-20 w-[100%] overflow-x-hidden flex flex-col justify-center items-center bg-white bg-opacity-30 backdrop-blur-sm h-screen">
    <div class=' top-16 right-12 absolute bg-red-900 p-3 rounded-lg flex justify-center items-center w-36 cursor-pointer text-slate-200 text-sm' onclick="window.location.replace('http://localhost/SMS/admin/subjectDash.php');">DISCARD</div>
    <div class='flex flex-col justify-center items-center z-20 m-10'><img src="../resource/subject-av.png" width="130" alt="" class="bg-orange-700 rounded-full  z-10">
        <h1><?= $subject['name'] ?></h1>
    </div>
    <form action="" method="post" class=" w-[100%]  overflow-y-hidden flex flex-col justify-center items-center z-10">
        <table class="bg-white border-2 border-solid border-black border-collapse shadow-gray-600 rounded-2xl">
            <tr>
                <th class="p-3 px-24 text-sm bg-orange-700 text-white"><?= $attr[0] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="text" value="<?= $subject['subject_id'] ?>" name='<?= $attr[0] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-orange-700 text-white"><?= $attr[1] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="text" value="<?= $subject['name'] ?>" name='<?= $attr[1] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-orange-700 text-white"><?= $attr[2] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="number" value="<?= $subject['grade_id'] ?>" name='grade'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-orange-700 text-white"><?= $attr[3] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="number" value="<?= $subject['teacher_id'] ?>" name='teacher'></td>
            </tr>




        </table>
        <div class=' top-16 right-52 absolute bg-orange-700 p-3 rounded-lg flex justify-center items-center w-36 cursor-pointer text-slate-200 text-sm'><input name='submit' type="submit" value="UPDATE SUBJECT"></div>
    </form>

</dialog>

<?php
include '../db/connection.php';
if (isset($_POST['submit'])) {

    $q2 = "update subject set subject_id = '"
        . $_POST[$attr[0]] . "', name = '"
        . $_POST[$attr[1]] . "', grade_id = '"
        . $_POST['grade'] . "', teacher_id = '"
        . $_POST['teacher'] . "' where subject_id =" . $_POST[$attr[0]];
    mysqli_query($conn, $q2);
    echo "<script>window.location.replace('http://localhost/SMS/admin/subjectDash.php');</script>";
}

?>