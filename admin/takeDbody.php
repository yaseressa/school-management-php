<?php
include '../db/connection.php';
$queryt = mysqli_query($conn, 'select * from classroom left join grade using(grade_id);');

?>
<script>
    var attendance = {}
</script>
<div class=" flex flex-col items-center justify-center translate-y-32 translate-x-[20%]  w-[80%] overflow-x-hidden">
    <div class="flex justify-between items-center w-[90%]">

        <div class="flex flex-col flex-wrap ml-20 ">
            <form action="" class="flex flex-row justify-center items-center w-[90%]" method='post'>
                <select value='CHOOSE A CLASS' class="bg-gradient-to-r to-slate-900 from-blue-900 shadow-lg shadow-gray-700 text-slate-200 rounded-bl-lg rounded-tl-lg w-96 h-10 p-3" name='classes'>
                    <?php

                    while ($qt = mysqli_fetch_assoc($queryt)) { ?>
                        <option class="text-blue-900 " value="<?= $qt['classroom_id'] ?>"><?= $qt['classroom_id'] ?> - <?= $qt['name'] ?> - <?= $qt['section'] ?></option>
                    <?php } ?>

                </select>
                </select>

                <input type="submit" name="submitc" value="search" class="shadow-lg shadow-gray-700 bg-stone-900 p-3 rounded-br-lg  rounded-tr-lg flex justify-center items-center w-36 text-slate-200 text-sm add-Teacher">

            </form>

        </div>

        <form action="" method="post">
            <h1 class="">Date: <?= date('Y-m-d') ?></h1>
            <input type="submit" name="sb" value="SUBMIT" class="shadow-lg shadow-gray-700 bg-stone-900 p-3 rounded-lg flex justify-center items-center w-36 text-slate-200 text-sm add-Teacher" onclick="(()=> {document.cookie ='attendance='+ JSON.stringify(attendance) })()">
        </form>
    </div>

    <table class="bg-white border-2 border-solid border-black border-collapse shadow-gray-600 mt-12 ml-16 rounded-2xl bg-gradient-to-b from-slate-900 to-blue-900">
        <tr class=" text-stone-900">
            <th class=" bg-stone-900 text-white">ID</th>
            <th class=" bg-stone-900 text-white">NAME</th>

            <th class=" bg-slate-200"></th>
        </tr>
        <?php
        if (isset($_POST['submit']) && $_POST['query'] == '' || isset($_POST['submitc']) && $_POST['classes'] == '') {

            $query = 'select * from student';
            $query = mysqli_query($conn, $query);
        } elseif (!isset($_POST['submit']) && !isset($_POST['submitc'])) {

            $query = 'select * from student';
            $query = mysqli_query($conn, $query);
        } else {
            if (isset($_POST['submit']) && $_POST['query']) {
                $query = 'select * from student where student_id = ' . $_POST['query'];
                $query = mysqli_query($conn, $query);
            } elseif (isset($_POST['submitc']) && $_POST['classes']) {
                $q = "select * from classroom_student join student using(student_id) where classroom_id ='" . $_POST['classes'] . "'";
                $query = mysqli_query($conn, $q);
                $g = mysqli_fetch_assoc(mysqli_query($conn, "select * from classroom_student join student using(student_id) where classroom_id ='" . $_POST['classes'] . "'"));
                if ($g != null) {
                    $d = mysqli_fetch_assoc(mysqli_query($conn, "select * from attendence where date = '" . date('Y-m-d') . "' AND student_id = " . $g['student_id'] . ";"));

                    if ($d) {
                        echo "<script>window.location.replace(' /takeDash.php');alert('Already Taken for today')</script>";
                    }
                }
            } else {
                $q = "select * from classroom_student join student using(student_id) where classroom_id ='" . $_POST['classes'] . "', student_id = '" . $_POST['query'] . "';";
                $query = mysqli_query($conn, $q);
            }
        }


        while ($student_list = mysqli_fetch_assoc($query)) {


        ?>
            <tr class="border-collapse">
                <form action="" method="">
                    <td class=" border-2 px-2 py-0 border-solid border-gray-100 text-slate-200 text-sm"><?= $student_list['student_id'] ?></td>
                    <td class=" border-2 px-2 py-0 border-solid border-gray-100 text-slate-200 text-sm"><?= $student_list['name'] ?></td>
                    <?php if (isset($student_list['classroom_id'])) { ?>
                        <td class="p-4 bg-slate-200">

                            <div class="text-green-800 block h-6 p-3 m-3">
                                <input type="radio" name="st-<?= $student_list['student_id'] ?>" id="" value="p" onclick="(() => attendance['<?= $student_list['student_id'] ?>'] = 'P')()"> P
                            </div>
                            <div class="text-red-700 block h-6 p-3 m-3">
                                <input type="radio" name="st-<?= $student_list['student_id'] ?>" id="" value="a" onclick="(() => attendance['<?= $student_list['student_id'] ?>'] = 'A')()"> A
                            </div>

                        </td>
                <?php }
                }; ?>
                </form>
            </tr>


    </table>

</div>
<?php
if (isset($_POST['sb'])) {

    foreach (json_decode($_COOKIE['attendance']) as $k => $v) {
        mysqli_query($conn, "insert into attendence values('" . date('Y-m-d') . "', '" . $k . "', '" . $v . "');");
    }
}
// for ($i = 1; $i < count($_POST['status']); $i++) {
//     //$att = "insert into attendence values('" . date('Y-m-d') . "', " . "";
// }
?>