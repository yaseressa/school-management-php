    <div class="">
        <div class="fixed top-[70px] left-0 h-screen rounded-tr-xl w-[18%] m-0 bg-stone-900  text-slate-200 z-20 shadow-inner shadow-black">
            <div class="w-[100%] relative top-8 flex flex-col justify-center items-center">
                <ul class="mt-3 w-[100%] flex justify-center">
                    <li class="mt-5 p-2 w-[100%] rounded-tl-md rounded-bl-md  <?= $profile ?>">
                        <a href='./studentDash.php' class="  flex flex-row justify-center items-center">
                            <i class="fa fa-lg fa-user <?= $spinp ?> side_bar_icon "></i>
                            <h2 class=" px-5">PROFILE</h2>
                        </a>
                    </li>
                </ul>

                <ul class="mt-3 w-[100%] flex justify-center">
                    <li class=" mt-5 p-2 w-[100%] rounded-tl-md rounded-bl-md <?= $exam ?>">
                        <a href='./examsDash.php' class=" flex flex-row justify-center items-center">
                            <i class="fa <?= $spinx ?> fa-lg fa-graduation-cap side_bar_icon"></i>
                            <h2 class="px-5">EXAMS</h2>
                        </a>
                    </li>
                </ul>

                <ul class="mt-3 w-[100%] flex justify-center">
                    <li class=" mt-5 p-2 w-[100%] rounded-tl-md rounded-bl-md <?= $attend ?>">
                        <a href='./attendance.php' class=" flex flex-row justify-center items-center">
                            <i class="fa <?= $spina ?> fa-lg fa-check side_bar_icon"></i>
                            <h2 class="px-5">ATTENDANCE</h2>
                        </a>
                    </li>
                </ul>


            </div>
            <div class="absolute bottom-20 left-0 flex flex-row w-64 bg-gray-500">
                <a href="setting.php" class="flex flex-row justify-start items-center">
                    <h2 class=" m-5 text-xl">SETTINGS</h2> <i class="fa fa-lg fa-cog side_bar_icon"></i>
                </a>
            </div>
        </div>
    </div>