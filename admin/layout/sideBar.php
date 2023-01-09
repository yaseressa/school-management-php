    <div class="">
    <div class="fixed top-[70px] left-0 h-screen rounded-tr-xl w-[18%] m-0 bg-stone-900 text-slate-200 z-20 shadow-2xl shadow-black ">
    <div class="w-[100%] relative  mt-4 flex flex-col justify-center items-center">
    <h1 class="text-xl  bg-blue-900 w-[100%] p-6"><?= $head ?> </h1>
        <ul class="mt-3">
            <li  class="mt-5 p-2 rounded-tl-md rounded-bl-md  <?= $dash ?>">
            <a href='./adminDash.php' class="  flex flex-row justify-start items-center">
                <i class="fa fa-lg fa-tachometer <?= $spind?> side_bar_icon "></i>
                <h2 class="px-5 text-sm">DASHBOARD</h2>
            </a>
            </li>
            </ul>
      
        <ul class="mt-3">
            <li class=" mt-5 p-2 rounded-tl-md rounded-bl-md <?= $st ?>">
            <a href='./studentDash.php' class=" flex flex-row justify-start items-center">
                <i class="fa <?=$spinx?> fa-lg fa-user side_bar_icon"></i>
                <h2 class="px-5 text-sm">STUDENT</h2></a></li>
        </ul>
        <ul class="mt-3">
            <li class=" mt-5 p-2 rounded-tl-md rounded-bl-md <?= $spinte ?>">
            <a href='./teachDash.php' class=" flex flex-row justify-start items-center">
                <i class="fa <?=$spinx?> fa-lg fa-chalkboard-teacher side_bar_icon"></i>
                <h2 class="px-5 text-sm">TEACHER</h2></a></li>
        </ul>
        <ul class="mt-3">
            <li class=" mt-5 p-2 rounded-tl-md rounded-bl-md <?= $spinsu?>">
            <a href='./subjectDash.php' class=" flex flex-row justify-start items-center">
                <i class="fa <?=$l?> fa-lg fa-book side_bar_icon"></i>
                <h2 class="px-5 text-sm">SUBJECT</h2></a></li>
        </ul>
        <ul class="mt-3">
            <li class=" mt-5 p-2 rounded-tl-md rounded-bl-md <?= $spincl?>">
            <a href='./classDash.php' class=" flex flex-row justify-start items-center">
            <i class="fa fa-users-rectangle"></i>
                <h2 class="px-5 text-sm">CLASSROOM</h2></a></li>
        </ul>
        <ul class="mt-3">
            <li class=" mt-5 p-2 rounded-tl-md rounded-bl-md <?= $exam ?>">
            <a href='./examDash.php' class=" flex flex-row justify-start items-center">
                <i class="fa  fa-lg fa-bookmark side_bar_icon"></i>
                <h2 class="px-5 text-sm">Exam</h2></a></li>
        </ul>
        <ul class="mt-3">
            <li class=" mt-5 p-2 rounded-tl-md rounded-bl-md <?= $result ?>">
            <a href='./resultDash.php' class=" flex flex-row justify-start items-center">
                <i class="fa  fa-lg fa-hand-paper side_bar_icon"></i>
                <h2 class="px-5 text-sm">Result</h2></a></li>
        </ul>
        <!-- <ul class="mt-3">
            <li class=" mt-5 p-2 rounded-tl-md rounded-bl-md <?= $attend ?>">
            <a href='./attendDash.php' class=" flex flex-row justify-start items-center">
                <i class="fa <?=$spina?> fa-lg fa-check side_bar_icon"></i>
                <h2 class="px-5 text-sm">ATTENDANCE</h2></a></li>
        </ul> -->

  

    </div>
    <!-- <div class="absolute bottom-20 left-0 flex flex-row w-64 bg-gray-500">
        <a href="setting.php" class="flex flex-row justify-start items-center"><h2 class=" m-5 text-xl">SETTINGS</h2> <i class="fa fa-lg fa-cog side_bar_icon"></i></a>
    </div> -->
    </div>
    </div>
