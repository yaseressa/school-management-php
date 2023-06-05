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
<div class="w-[65%] relative top-[15%] translate-x-[35%]">
    <h1 class="text-4xl mb-4 tracking-widest">ANALYTICS</h1>
    <hr class="border-[5px] border-slate-900 rounded-full w-32 mb-5">

</div>
<div class="w-[50%] gap-[2%] relative left-[24%] top-[19%] mb-14 bg-slate-900 py-10 h-[345px] rounded-xl flex justify-end  items-center ">
    <canvas id="myChart" class="w-[70%]"></canvas>
    <div class="bg-white h-[390px] translate-y-4 rounded-tl-lg rounded-tr-lg  font-bold text-2xl text-slate-900 w-24 flex flex-col justify-evenly border-2 border-slate-400 items-center"><span>G</span><span>R</span><span>A</span><span>D</span><span>E</span><span>S</span></div>
</div>
<div class="absolute right-12 top-[43%] mb-14 h-[35%] rounded-xl flex flex-col justify-center  items-center ">
    <canvas id="pie"></canvas>
    <h1 class="text-2xl mt-6">DISTRIBUTIONS</h1>
</div>
<div class=" left-[25%] top-[22%] relative w-[70%] flex flex-col  justify-start flex-wrap overflow-x-hidden mb-40">
    <h1 class="text-4xl   mb-2 tracking-widest">SECTIONS</h1>
    <hr class="border-[5px] border-slate-900  rounded-full w-32 mb-5">
    <div class="flex items-center justify-between flex-wrap overflow-x-hidden">
        <div class="flex flex-row justify-center items-center hover:transition-opacity hover:scale-90 hover:cursor-pointer relative w-[45%] bg-gradient-to-tr from-gray-900 shadow-md shadow-gray-600 to-slate-600 rounded-lg p-5 px-28 text-slate-200">
            <img src="../resource/std_av.png" alt="" width="120" class="opacity-60">
            <div class="flex flex-col justify-center items-center ">
                <a href="./studentDash.php" class="flex flex-col justify-center items-center">
                    <h2 class="text-xl w-12'">STUDENTS</h2>
                    <h3 class="text-xl"><?= $query[0] ?></h3>
            </div></a>
            <h3 class="absolute bottom-0 right-0  bg-white rounded-tl-2xl  text-stone-900 p-3"><a href="./studentDash.php">VIEW</a></h3>
        </div>

        <div class="flex flex-row justify-evenly items-center relative hover:transition-opacity hover:scale-90 hover:cursor-pointer w-[45%] bg-gradient-to-tr from-gray-900 shadow-md shadow-gray-600 to-yellow-900 rounded-lg p-5 px-28 text-slate-200">
            <img src="../resource/teacher-av.png" alt="" width="120" class="opacity-50">
            <a href="./teachDash.php">
                <div class="flex flex-col justify-center items-center ">
                    <h2 class="text-xl w-12'">TEACHERS</h2>
                    <h3 class="text-xl "><?= $query2[0] ?></h3>
                </div>
            </a>
            <h3 class="absolute bottom-0 right-0  bg-white rounded-tl-2xl  text-stone-900 p-3"><a href="./teachDash.php">VIEW</a></h3>
        </div>


        <div class="flex flex-row justify-center items-center relative hover:transition-opacity hover:scale-90 hover:cursor-pointer w-[45%] bg-gradient-to-tr from-gray-900 shadow-md shadow-gray-600 to-blue-900 mt-4 rounded-lg p-5 px-28 text-slate-200">

            <img src="../resource/class-av.png" alt="" width="120" class="opacity-50">
            <a href="./classDash.php">
                <div class="flex flex-col justify-center items-center ">
                    <h2 class="text-xl ">CLASSROOMS</h2>
                    <h3 class="text-xl "><?= $query3[0] ?></h3>
                </div>
            </a>
            <h3 class="absolute bottom-0 right-0  bg-white rounded-tl-2xl  text-stone-900 p-3"><a href="./classDash.php">VIEW</a></h3>
        </div>

        <div class="flex flex-row justify-center items-center hover:transition-opacity hover:scale-90 hover:cursor-pointer  w-[45%] bg-gradient-to-tr from-gray-900 shadow-md shadow-gray-600 to-green-900 mt-4 rounded-lg p-5 px-28 text-slate-200">
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
<script>
    const ctx = document.getElementById('myChart');
    var grades = (<?= $grades ?>).map(x => `GRADE ${x}`);
    var sum = (<?= $sum ?>).map(x => Number(x));
    console.table(sum)
    Chart.defaults.color = 'rgb(255 255 255)';
    ctx.style.backgroundColor = 'rgb(15 23 42)';
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: grades,
            datasets: [{
                data: sum,
                borderWidth: 20,
                barPercentage: 0.5,
                borderColor: 'rgb(255 255 255)'
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
                            size: 10,

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