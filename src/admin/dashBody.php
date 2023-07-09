<?php
include '../db/connection.php';
$query = 'select COUNT(student_id) from student';
$query2 = 'select COUNT(teacher_id) from teacher';
$query3 = 'select COUNT(classroom_id) from classroom';
$query4 = 'select COUNT(subject_id) from subject';
$query5 = "SELECT grade_id, COUNT(student_id) as sum FROM `classroom_student` join classroom USING(classroom_id) GROUP BY grade_id ORDER BY grade_id;";
$query = mysqli_fetch_array(mysqli_query($conn, $query));
$query2 = mysqli_fetch_array(mysqli_query($conn, $query2));
$query3 = mysqli_fetch_array(mysqli_query($conn, $query3));
$query4 = mysqli_fetch_array(mysqli_query($conn, $query4));
$query5 = mysqli_query($conn, $query5);
$grades = [];
$sum = [];
while ($q = mysqli_fetch_array($query5)) {
    array_push($grades, $q['grade_id']);
    array_push($sum, $q['sum']);
}
$grades = json_encode($grades);
$sum = json_encode($sum);
$std = json_encode($query[0]);
$tch = json_encode($query2[0]);
$class = json_encode($query3[0]);

?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="md:left-[25%] left-[10%] md:top-[19%] top-[29%] relative w-[75%] overflow-hidden">
    <div class="mb-8 hidden md:block">
        <h1 class="text-4xl mb-4 tracking-widest ">SECTIONS</h1>
        <hr class="border-[5px] border-slate-900 rounded-full w-32 mb-5">
    </div>
    <div class="  flex flex-col justify-center flex-wrap md:overflow-x-hidden mb-40">
        <div class="flex items-center md:justify-start justify-center gap-11 flex-wrap w-fit md:overflow-x-hidden">
            <div class="flex flex-row justify-center items-center hover:transition-opacity hover:scale-90 hover:cursor-pointer relative md:w-[45%] w-[85%] bg-gradient-to-tr from-gray-900 shadow-md shadow-gray-600 to-slate-600 rounded-lg p-5 px-28 text-slate-200">
                <img src="../resource/std_av.png" alt="" width="120" class="opacity-60 ">
                <div class="flex flex-col justify-center items-center ">
                    <a href="./studentDash.php" class="flex flex-col justify-center items-center">
                        <h2 class="text-xl w-12'">STUDENTS</h2>
                        <h3 class="text-xl"><?= $query[0] ?></h3>
                </div></a>
                <h3 class="absolute bottom-0 right-0  bg-white rounded-tl-2xl  text-stone-900 p-3"><a href="./studentDash.php">VIEW</a></h3>
            </div>

            <div class="flex flex-row justify-evenly items-center relative hover:transition-opacity hover:scale-90 hover:cursor-pointer md:w-[45%] w-[85%] bg-gradient-to-tr from-gray-900 shadow-md shadow-gray-600 to-yellow-900 rounded-lg p-5 px-28 text-slate-200">
                <img src="../resource/teacher-av.png" alt="" width="120" class="opacity-50">
                <a href="./teachDash.php">
                    <div class="flex flex-col justify-center items-center ">
                        <h2 class="text-xl w-12'">TEACHERS</h2>
                        <h3 class="text-xl "><?= $query2[0] ?></h3>
                    </div>
                </a>
                <h3 class="absolute bottom-0 right-0  bg-white rounded-tl-2xl  text-stone-900 p-3"><a href="./teachDash.php">VIEW</a></h3>
            </div>


            <div class="flex flex-row justify-center items-center relative hover:transition-opacity hover:scale-90 hover:cursor-pointer md:w-[45%] w-[85%] bg-gradient-to-tr from-gray-900 shadow-md shadow-gray-600 to-blue-900 mt-2 rounded-lg p-5 px-28 text-slate-200">

                <img src="../resource/class-av.png" alt="" width="120" class="opacity-50">
                <a href="./classDash.php">
                    <div class="flex flex-col justify-center items-center ">
                        <h2 class="text-xl ">CLASSROOMS</h2>
                        <h3 class="text-xl "><?= $query3[0] ?></h3>
                    </div>
                </a>
                <h3 class="absolute bottom-0 right-0  bg-white rounded-tl-2xl  text-stone-900 p-3"><a href="./classDash.php">VIEW</a></h3>
            </div>

            <div class="flex flex-row justify-center items-center relative hover:transition-opacity hover:scale-90 hover:cursor-pointer  md:w-[45%] w-[85%] bg-gradient-to-tr from-gray-900 shadow-md shadow-gray-600 to-green-900 mt-2 rounded-lg p-5 px-28 text-slate-200">
                <img src="../resource/subject-av.png" alt="" width="110" class="opacity-50">
                <a href="subjectDash.php">
                    <div class="flex flex-col justify-center items-center ">
                        <h2 class="text-xl ">SUBJECTS</h2>
                        <h3 class="text-xl "><?= $query4[0] ?></h3>
                    </div>
                </a>
                <h3 class="absolute bottom-0 right-0  bg-white rounded-tl-2xl  text-stone-900 p-3"><a href="subjectDash.php">VIEW</a></h3>
            </div>
        </div>
    </div>
    <div class="mb-8">
        <h1 class="text-4xl mb-4 tracking-widest">ANALYTICS</h1>
        <hr class="border-[5px] border-slate-900 rounded-full w-32 mb-5">
    </div>
    <div class="flex md:flex-row flex-col-reverse justify-evenly items-center">
        <div class=" mb-14 mt-8 py-4 md:h-[50dvh] w-[100%] md:w-[40%] rounded-xl flex justify-start  items-center ">
            <canvas id="myChart" class=""></canvas>
        </div>
        <div class="md:w-[20%] w-[70%] mt-4 md:m-0 rounded-xl flex flex-col justify-center  items-center ">
            <canvas id="pie"></canvas>
            <h1 class="md:text-[2rem] mt-6">DISTRIBUTIONS</h1>
        </div>
    </div>

</div>
<script>
    const ctx = document.getElementById('myChart');
    var grades = (<?= $grades ?>).map(x => `GRADE ${x}`);
    var sum = (<?= $sum ?>).map(x => Number(x));
    console.table(sum)
    Chart.defaults.color = '#34495e';
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: grades,
            datasets: [{
                data: sum,
                borderWidth: 10,
                barPercentage: 0.5,
                borderColor: 'rgb(15 23 42)'
            }]
        },
        options: {
            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 15,
                            rotation: 45
                        },

                    }

                },
                y: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 15,

                        }
                    }
                },


            },
            plugins: {
                legend: false,
            },

        },

    });
    var data = [<?= $std ?>, <?= $tch ?>, <?= $class ?>]
    var pie = document.getElementById("pie").getContext('2d');
    Chart.defaults.color = 'rgb(0 0 0)';
    var myChart = new Chart(pie, {
        type: 'doughnut',
        data: {
            labels: ["STUDENT", "TEACHER", "CLASSROOM"],
            datasets: [{
                backgroundColor: [
                    "#34495e",
                    "rgb(15 23 42)",
                    "#000",

                ],
                data: data
            }],
        },
        options: {
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>