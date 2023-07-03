<?php
$attr = array(
    'ID',
    'EXAM',
    'DATE',
    'TYPE'

);
$types = [
    "TRUE/FALSE",
    "MCQ",
    "STRUCTURED QUESTIONS",
    "FILL THE BLANKS"
];

include '../db/connection.php';
if (isset($_GET['ex'])) {
    $ex = mysqli_fetch_assoc(mysqli_query($conn, "select * from exam where exam_id = '" . $_GET['ex'] . "'"));
}

?>

<dialog open class="overflow-y-visible z-20 w-[100%] overflow-x-hidden flex flex-col justify-center items-center bg-white bg-opacity-30 backdrop-blur-sm h-screen">
    <div class=' top-16 right-12 absolute whitespace-nowrap bg-red-900 p-3 rounded-lg flex justify-center items-center w-36 cursor-pointer text-slate-200 text-sm' onclick="window.location.replace(' /examDash.php');">DISCARD CHANGES</div>

    <div class='flex flex-col justify-center items-center z-20 m-10'><img src="../resource/exam-av.png" width="130" alt="" class="bg-blue-900 rounded-2xl  z-10">
        <h1><?= $ex['name'] ?></h1>
    </div>
    <form action="" method="post" class=" w-[100%]  overflow-y-hidden flex flex-col justify-center items-center z-10">
        <table class="bg-white border-2 border-solid border-black border-collapse shadow-gray-600 rounded-2xl">
            <tr>
                <th class="p-3 px-24 text-sm bg-blue-900 text-white"><?= $attr[0] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required type="number" class="h-12 w-[100%]" value="<?= $ex["exam_id"] ?>" name="ID" disabled></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-blue-900 text-white"><?= $attr[1] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required type="text" class="h-12 w-[100%]" value="<?= $ex["name"] ?>" name="<?= $attr[1] ?>"></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-blue-900 text-white"><?= $attr[2] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required type="date" class="h-12 w-[100%]" value="<?= $ex["date"] ?>" name="<?= $attr[2] ?>"></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-blue-900 text-white"><?= $attr[3] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900">
                    <select class="h-12 w-[100%]" name='TY'>
                        <?php

                        for ($q = 0; $q < count($types); $q++) {
                            if ($ex['type'] == $types[$q]) { ?>
                                <option value="<?= $types[$q] ?>" selected><?= $types[$q] ?></option>
                            <?php } else { ?>
                                <option value="<?= $types[$q] ?>"><?= $types[$q] ?></option>
                        <?php }
                        } ?>
                    </select>
                </td>
            </tr>
            </td>






        </table>
        <div class=' top-16 right-52 absolute bg-blue-900 p-3 rounded-lg flex justify-center items-center w-36 cursor-pointer text-slate-200 text-sm'><input name='submit' type="submit" value="UPDATE EXAM"></div>
    </form>

</dialog>

<?php
include '../db/connection.php';
if (isset($_POST['submit'])) {
    $q2 = "update exam set name = '"
        . $_POST[$attr[1]] . "', date = '"
        . $_POST[$attr[2]] . "', type = '"
        . $_POST["TY"] . "' where exam_id = '" . $ex['exam_id'] . "';";
    mysqli_query($conn, $q2);
    echo "<script>window.location.replace(' /examDash.php');</script>";
}

?>