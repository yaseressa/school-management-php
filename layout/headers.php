<div class="z-20 w-[100%] fixed h-[70px] bg-transparent m-auto">
   <div class=" pt-3 mx-16 rounded-xl flex justify-between items-center">
    <h1 class="text-3xl text-slate-200"><?= $head ?></h1>
    <a href="logout.php" class="flex flex-row justify-start items-center"> <i class="fa fa-2x text-slate-200 fa-sign-out side_bar_icon"></i></a>   
   </div>
</div><div class="z-20 w-[100%] fixed h-[70px] bg-transparent text-slate-600 m-auto">
   <div class=" pt-3 mx-16 ml-10 flex justify-between items-center">
   <div class="flex justify-evenly bg-slate-600 items-center p-3 h-10 rounded-2xl">
        <img src="./resource/std_av.png" width="50" alt="" class=" bg-slate-500 p-2 rounded-full">
        <h1 class="   text-slate-200 m-4 uppercase"><?= $_SESSION['user']['name'] ?></h1>
        </div>
    <h1 class="text-3xl">School Name</h1>
    <a href="logout.php" class="flex flex-row justify-start items-center"> <i class=" text-slate-900 fa-shake fa fa-lg  fa-sign-out side_bar_icon"></i></a>   
   </div>
</div>