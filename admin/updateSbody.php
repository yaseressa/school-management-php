<style>

</style>
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
$part = array('PARENT ', 'PARENT EMAIL', 'PARENT TEL');
$parent = array('pname', 'pemail', 'pphone');

if (isset($_GET['st'])) {
    include '../db/connection.php';
    $student = mysqli_fetch_assoc(mysqli_query($conn, "select * from student where student_id = '" . $_GET['st'] . "'"));
    $class = mysqli_fetch_assoc(mysqli_query($conn, "select * from classroom_student left join classroom using(classroom_id) where student_id = '" . $_GET['st'] . "'"));

    $parent_t = mysqli_fetch_assoc(mysqli_query($conn, "select * from parent where parent_id = '" . $_GET['st'] . "'"));
}
?>
<dialog id="id" class="overflow-y-visible z-20 w-[100%] overflow-x-hidden flex flex-col justify-center items-center bg-white bg-opacity-30 backdrop-blur-sm h-screen">
    <div class=' top-1 right-12 absolute whitespace-nowrap bg-stone-900 p-3 rounded-lg flex justify-center items-center w-36 cursor-pointer text-slate-200 text-sm' onclick="window.print()">Generate</div>

    <div class="bg-white w-[700px] rounded-2xl">
        <div class="flex justify-between items-center px-6">
            <div class=""><img width="50" src="../resource/logo.png" alt=""></div>
            <h1 class="text-center text-2xl">School Name</h1>
            <div class=""><img width="50" src="../resource/logo.png" alt=""></div>

        </div>
        <hr class="border-2 border-stone-900">
        <div class=" flex h-[250px] w-[100%] justify-evenly pt-8">
            <div class="w-[150px] h-[150px]"><img width="150" src="../resource/std_av.png" alt=""></div>
            <div class="flex flex-col justify-start flex-wrap items-center w-[500px] gap-x-6">

                <div>

                    <div class=" w-[150px] rounded-sm  text-black ">
                        ID:
                    </div>
                    <p class="pt-2 pb-5 text-left pl-3 font-mono text-sm"><?= $student['student_id'] ?></p>
                </div>
                <div>
                    <div class=" w-[150px] rounded-sm  text-black ">
                        Name:
                    </div>
                    <p class="pt-2 pb-5 text-left pl-3 font-mono text-sm"><?= $student['name'] ?></p>
                </div>
                <div>
                    <div class=" w-[150px] rounded-sm  text-black ">
                        Parent Name:
                    </div>
                    <p class="pt-2 pb-5 text-left pl-3 font-mono text-sm"><?= $parent_t['name'] ?></p>
                </div>
                <div>
                    <div class=" w-[150px] rounded-sm  text-black">
                        Date of Join:
                    </div>
                    <p class="pt-2 pb-5 text-left pl-3 font-mono text-sm"><?= $student['date_of_join'] ?></p>

                </div>
                <div>
                    <div class=" w-[150px] rounded-sm  text-black">
                        Grade
                    </div>
                    <p class="pt-2 pb-5 text-left pl-3 font-mono text-sm"><?= $class['grade_id'] ?></p>

                </div>
            </div>
        </div>
    </div>
</dialog>
<dialog open id="up" class="overflow-y-visible z-20 w-[100%] overflow-x-hidden flex flex-col justify-center items-center bg-white bg-opacity-30 backdrop-blur-sm h-screen">
    <div class=' top-16 right-12 absolute whitespace-nowrap bg-red-900 p-3 rounded-lg flex justify-center items-center w-36 cursor-pointer text-slate-200 text-sm' onclick="window.location.replace(' /studentDash.php');">DISCARD CHANGES</div>
    <div class=' top-1 right-12 absolute whitespace-nowrap bg-stone-900 p-3 rounded-lg flex justify-center items-center w-36 cursor-pointer text-slate-200 text-sm' onclick="document.getElementById('id').showModal()">ID card</div>
    <div class='flex flex-col justify-center items-center z-20 m-4'>
        <img src="../resource/std_av.png" width="130" alt="" class="bg-stone-900 rounded-2xl  z-10">
        <h1 class="mt-4"><?= $student['name'] ?></h1>
    </div>
    <form method="post" class=" w-[100%]  h-screen flex flex-col flex-wrap justify-center items-center ">
        <table class="bg-white rounded-2xl">
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[0] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" value="<?= $student['student_id'] ?>" type="text" name='<?= $attr[0] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[1] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input require class="h-12 w-[100%]" value="<?= $student['name'] ?>" type="text" name='<?= $attr[1] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[2] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="email" value="<?= $student['email'] ?>" name='<?= $attr[2] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[3] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="password" value="<?= $student['password'] ?>" name='<?= $attr[3] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[4] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="date" value="<?= $student['dob'] ?>" name='<?= $attr[4] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[5] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="text" value="<?= $student['sex'] ?>" name='<?= $attr[5] ?>'></td>
            </tr>
        </table>
        <table class="bg-white rounded-2xl">
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[6] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required class="h-12 w-[100%]" type="text" value="<?= $student['Address'] ?>" name='<?= $attr[6] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[7] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input type="phone" class="h-12 w-[100%]" value="<?= $student['phone'] ?>" name='<?= $attr[7] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $attr[8] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input type="date" class="h-12 w-[100%]" value="<?= $student['date_of_join'] ?>" name='<?= $attr[8] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $part[0] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required type="text" class="h-12 w-[100%]" value="<?= $parent_t['name'] ?>" name='<?= $parent[0] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $part[1] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input required type="email" class="h-12 w-[100%]" value="<?= $parent_t['email'] ?>" name='<?= $parent[1] ?>'></td>
            </tr>
            <tr>
                <th class="p-3 px-24 text-sm bg-stone-900 text-white"><?= $part[2] ?></th>
                <td class="p-3 px-24 border-2 border-solid border-stone-900"><input type="phone" class="h-12 w-[100%]" value="<?= $parent_t['phone'] ?>" name='<?= $parent[2] ?>'></td>
            </tr>

        </table>
        <div class=' top-16 right-52 absolute bg-stone-900 p-3 rounded-lg flex justify-center items-center w-36 cursor-pointer text-slate-200 text-sm'><input name='submit' type="submit" value="UPDATE STUDENT"></div>
    </form>

</dialog>


<?php
include '../db/connection.php';
if (isset($_POST['submit'])) {
    $q =   "update parent set parent_id = '" . $_POST[$attr[0]] . "', name = '"  . $_POST[$parent[0]] . "', phone = '" . $_POST[$parent[2]] . "', email = '" . $_POST[$parent[1]] . "' where parent_id = '" . $_POST[$attr[0]] . "'";
    $q2 = "update student set student_id = '"
        . $_POST[$attr[0]] . "', name = '"
        . $_POST[$attr[1]] . "', email = '"
        . $_POST[$attr[2]] . "', password = '"
        . $_POST[$attr[3]] . "', dob = '"
        . $_POST[$attr[4]] . "', sex = '"
        . $_POST[$attr[5]] . "', address = '"
        . $_POST[$attr[6]] . "', phone = '"
        . $_POST[$attr[7]] . "', date_of_join = '"
        . $_POST[$attr[8]] . "', parent_id = '"
        . $_POST[$attr[0]] . "' where student_id = '" . $_POST[$attr[0]] . "'";;
    mysqli_query($conn, $q);
    mysqli_query($conn, $q2);
    echo "<script>window.location.replace(' /studentDash.php');</script>";
}

?>