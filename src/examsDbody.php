<?php
include './db/connection.php';
$query = "select * from result where student_id = '" . $_SESSION['user']['student_id'] . "'";




?>
<div class=" flex flex-col items-center justify-between translate-y-28 translate-x-44 w-[80%] overflow-x-hidden">
    <div class=" text-slate-600 text-2xl w-[100%] ">
        <h1 class="text-center ">EXAMINATIONS</h1>
    </div><br><br>
    <div class=" flex items-start justify-evenly w-[100%] text-sm rounded-br-lg rounded-tr-lg shadow-sm z-10 bg-slate-600 shadow-black">
        <h1 class="text-xl w-[35%] text-right text-slate-200">YEARLY EXAMS</h1>
        <table class="w-[600px] border-1 border-black">
            <tr>
                <th class=" text-slate-600 bg-slate-200">DATE</th>
                <th class=" text-slate-600 bg-slate-200">NAME</th>
                <th class=" text-slate-600 bg-slate-200">TYPE</th>
            </tr>

            <?php
            $q = "select * from exam ";
            $e = mysqli_query($conn, $q);
            while ($examty = mysqli_fetch_assoc($e)) {
                $name = $examty['name'];
                $dt = $examty['date'];
                $ty = $examty['type'];
                echo "    <tr>
                <th class='text-slate-200'>$dt</th>
                <th class='text-slate-200'>$name</th>
                <th class='text-slate-200'>$ty</th>
            </tr>";
            }
            ?>
        </table>
    </div><br><br><br><br>
    <div class=" flex items-start flex-col translate-x-80 justify-between w-[100%] text-sm tracking-wider ">
        <h1 class="text-xl w-[35%] text-right text-slate-600">MID-TERM</h1><br>
        <table class="w-[600px] border-1 border-black">
            <tr>
                <th class=" bg-slate-600 text-slate-200">SUBJECT</th>
                <th class=" bg-slate-600 text-slate-200">EXAM</th>
                <th class=" bg-slate-600 text-slate-200">MARKS</th>
            </tr>

            <?php
            $mid = mysqli_query($conn, $query);
            while ($result = mysqli_fetch_assoc($mid)) {
                $query2 = "select * from exam where exam_id = '" . $result['exam_id'] . "'";
                $query3 = "select * from subject where subject_id = '" . $result['subject_id'] . "'";
                $subject = mysqli_fetch_assoc(mysqli_query($conn, $query3));
                $exam = mysqli_fetch_assoc(mysqli_query($conn, $query2));
                $sn = $subject['name'];
                $en = $exam['name'];
                $res = $result['marks'];
                if ($exam['exam_id'] == 1) {
                    echo "    <tr>
                <th>$sn</th>
                <th>$en</th>
                <th>$res</th>
            </tr>";
                }
            }
            ?>
        </table>
    </div><br><br><br>
    <div class=" flex items-start flex-col translate-x-80 justify-between w-[100%] text-sm tracking-wider ">
        <h1 class="text-xl w-[35%] text-right text-slate-600">FINAL</h1><br>
        <table class="w-[600px] border-1 border-black">
            <tr>
                <th class=" bg-slate-600 text-slate-200">SUBJECT</th>
                <th class=" bg-slate-600 text-slate-200">EXAM</th>
                <th class=" bg-slate-600 text-slate-200">MARKS</th>
            </tr>

            <?php
            $query = mysqli_query($conn, $query);
            while ($result = mysqli_fetch_assoc($query)) {
                $query2 = "select * from exam where exam_id = '" . $result['exam_id'] . "'";
                $query3 = "select * from subject where subject_id = '" . $result['subject_id'] . "'";
                $subject = mysqli_fetch_assoc(mysqli_query($conn, $query3));
                $exam = mysqli_fetch_assoc(mysqli_query($conn, $query2));
                $sn = $subject['name'];
                $en = $exam['name'];
                $res = $result['marks'];
                if ($exam['exam_id'] == 2) {
                    echo "    <tr>
                <th>$sn</th>
                <th>$en</th>
                <th>$res</th>
            </tr>";
                }
            }
            ?>
        </table>
    </div>
</div>
</div>