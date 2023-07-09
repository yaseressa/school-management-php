<style>
   .d {
      direction: rtl;
   }

   ::-webkit-scrollbar {
      height: 2px;
      width: 3px;
   }

   /* Track */
   ::-webkit-scrollbar-track {
      background: gainsboro;
      border-radius: 5px;
   }

   /* Handle */
   ::-webkit-scrollbar-thumb {
      background: #1e3a8a;
      border-radius: 5px;
   }

   /* Handle on hover */
   ::-webkit-scrollbar-thumb:hover {
      background: #555;
   }
</style>
<div class="z-20 md:top-0 top-[15px] w-[100%] md:fixed sticky h-[50px] bg-slate-100 bg-opacity-50 text-slate-600 ">
   <div class=" pt-1 mx-16 ml-10 flex md:flex-row  md:w-full w-[80%] justify-between items-center">
      <div class="flex justify-evenly bg-slate-600 items-center p-3 h-10 rounded-2xl">
         <img src="../resource/admin-av.png" width="50" alt="" class=" bg-slate-500 p-2 rounded-full">
         <h1 class="   text-slate-200 m-4 uppercase">Admin</h1>
      </div>
      <h1 class="text-3xl hidden md:block">School Management System</h1>
      <a href="logout.php" class="flex flex-row justify-end items-center md:block md:w-24"> <i class=" text-slate-900 fa-shake fa fa-lg  fa-sign-out side_bar_icon"></i></a>
   </div>
</div>