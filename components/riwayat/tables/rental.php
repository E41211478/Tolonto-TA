 <!-- table start -->
 <section class="mt-24 text-neutral_050  ml-16">
     <div class="container px-6 max-w-full ">
         <div id="atas" class="bg-neutral_800 rounded-xl shadow-elevation-dark-4 px-8 duration-300 ease-in-out relative pt-5">
             <div class="flex flex-wrap flex-col ">
                 <div class=" flex flex-row justify-between items-center -mb-3">
                     <div class="flex gap-4 items-center">
                         <h1 class="capitalize font-semibold">Rental</h1>
                         <h2><?php echo $jumlah_rent ?></h2>
                     </div>
                     <div class="flex flex-row gap-2 sm:gap-5">
                         <button id="hapus-semua-rental" title="hapus semua riwayat rental" class="h-[36px] bg-neutral_050 hover:bg-neutral_050/90 focus:bg-neutral_050/75 rounded-full p-4 flex flex-row items-center justify-center mx-auto gap-3">
                             <h1 class="text-neutral_900 font-semibold hidden sm:block">Hapus Semua Rental</h1>
                             <svg width="16" class="xs:w-[22px] sm:w-[26px]" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M5 0V1H0V3H1V16C1 16.5304 1.21071 17.0391 1.58579 17.4142C1.96086 17.7893 2.46957 18 3 18H13C13.5304 18 14.0391 17.7893 14.4142 17.4142C14.7893 17.0391 15 16.5304 15 16V3H16V1H11V0H5ZM3 3H13V16H3V3ZM5 5V14H7V5H5ZM9 5V14H11V5H9Z" fill="#E53935" />
                             </svg>
                         </button>
                         <span id="open" title="buka/tutup table rental" class="w-[36px] h-[36px] bg-neutral_050 hover:bg-neutral_050/90 focus:bg-neutral_050/75 rounded-full flex items-center justify-center cursor-pointer -mr-2">
                             <span class="bg-neutral_900 w-3.5 h-[2px] rounded-full"></span>
                             <span id="plus" class="bg-neutral_800 w-[2px] h-3.5 absolute rounded-full"></span>
                         </span>
                     </div>
                 </div>
                 <span id="garis" class="w-full mx-auto mt-5 -top-4 h-[2px] bg-neutral_600 rounded-full"></span>
                 <h1 id="data-kosong" class="hidden my-auto mt-3 text-xl">Tidak Ada Data</h1>
                 <div class="w-full mx-auto relative h-[360px] block overflow-y-auto mt-2" id="table">
                     <table class="w-full">
                         <thead class="bg-neutral_800 sticky -top-[1.4px]">
                             <tr class="font-semibold ">
                                 <th scope="col" class="text-left pl-4 relative">
                                     <div class="flex flex-row gap-x-3 items-center">
                                         <i class="fa-solid fa-magnifying-glass "></i>
                                         <input type="text" id="search" name="search" class="border-none font-normal text-base bg-transparent  outline-none placeholder:text-neutral_400 placeholder:pl-0.5  placeholder:font-noto-sans placeholder:text-base" placeholder="Cari ID Rental">
                                     </div>
                                 </th>
                                 <th scope="col" class="text-left pl-4  ">
                                     <h1 class="bg-neutral_050 text-neutral_900 p-1 flex justify-center mx-auto w-32 rounded-2xl">
                                         NAMA PS
                                     </h1>
                                 </th>
                                 <th scope="col" class="text-left pl-4  ">
                                     <h1 class="cursor-default bg-neutral_050 text-neutral_900 p-1 flex px-3 justify-center mx-auto w-[164px] rounded-2xl">
                                         WAKTU ORDER
                                     </h1>
                                 </th>
                                 </th>
                                 <th scope="col" class="text-left pl-4  ">
                                     <h1 class="cursor-default bg-neutral_050 text-neutral_900 p-1 flex px-3 justify-center mx-auto w-[164px] rounded-2xl">
                                         PLAY TIME
                                     </h1>
                                 </th>
                                 </th>
                                 <th scope="col" class="text-left pl-4  ">
                                     <h1 class="cursor-default bg-neutral_050 text-neutral_900 p-1 flex px-3 justify-center mx-auto w-[164px] rounded-2xl">
                                         WAKTU RENTAL
                                     </h1>
                                 </th>
                                 </th>
                                 <th scope="col" class="text-left pl-4 ">
                                     <h1 class="bg-neutral_050 text-neutral_900 p-1 flex justify-center mx-auto w-32 rounded-2xl">
                                         TOTAL
                                     </h1>
                                 </th>
                                 <th scope="col" class="text-left pl-4  ">
                                     <h1 class="bg-neutral_050 text-neutral_900 p-1 flex justify-center mx-auto w-32 rounded-2xl">
                                         STATUS
                                     </h1>
                                 </th>
                                 <th scope="col" class="text-left pl-4  ">
                                     <h1 class="bg-transparent text-neutral_050 p-1 flex justify-center mx-auto w-32 rounded-2xl">
                                         OPTIONS
                                     </h1>
                                 </th>
                             </tr>
                         </thead>
                         <tbody class="overflow-y-hidden">
                             <!-- list 1 start -->
                             <?php
                                $row = 0;
                                if (empty($rent)) {
                                    echo
                                    '<script>
                                    document.getElementById("table").style.display = "none"
                                        
                                    document.getElementById("data-kosong").classList.remove("hidden") 
                
                                    document.getElementById("atas").classList.add("h-[450px]") 
    
                                    if (document.getElementById("atas").classList.contains("h-[77px]")) {
                                        document.getElementById("data-kosong").classList.add("hidden")
                                    }
    
                                        </script> ';
                                } else {
                                    while ($row < count($rent)) { ?>
                                     <tr class="">
                                         <td class="flex flex-row gap-x-3 pb-5">
                                             <div class="flex flex-row justify-center items-center w-10 ">
                                                 <h1 class="font-semibold font-noto-sans text-xl my-auto"><?php echo $row + 1 ?></h1>
                                             </div>
                                             <div class="rounded-full w-[42px] h-[42px] bg-error_050 flex flex-row items-center justify-center">
                                                 <img src="img/user/<?php echo FormatID::convert($rent[$row]['user_id']) ?>/<?php echo $rent[$row]['img'] ?>" alt="gambar user" class="rounded-full w-full h-full object-cover">
                                             </div>
                                             <div class="flex flex-col gap-y-1 ml-2">
                                                 <h1 class="font-semibold"><?php echo $rent[$row]['username'] ?></h1>
                                                 <h2 class="text-neutral_400 text-xs"><?php echo $rent[$row]['id_rental'] ?></h2>
                                             </div>
                                         </td>
                                         <td class="pl-4 text-center"><?php echo $rent[$row]['nama_ps'] ?></td>
                                         <td class="pl-4 text-center"><?php echo date('H:i:s d/m/y', strtotime($rent[$row]['waktu_order'])) ?></td>
                                         <td class="pl-4 text-center"><?php echo $rent[$row]['playtime'] ?> Jam</td>
                                         <td class="pl-4  text-center"><?php echo date('H:i:s d/m/y', strtotime($rent[$row]['mulai_rental'])) ?>
                                         - <?php echo date('H:i:s d/m/y', strtotime($rent[$row]['selesai_rental'])) ?></td>
                                         <td class="pl-9 text-left"><?php echo Rupiah::to($rent[$row]['bayar']) ?></td>
                                         <td class="pl-4 text-center"><?php echo $rent[$row]['status'] ?></td>
                                         <td class="pl-4  text-center">
                                             <button id="hapus-rental" title="hapus riwayat rental" value="<?php echo $rent[$row]['id_rental'] ?>" class="h-[36px] bg-neutral_050 hover:bg-neutral_050/90 focus:bg-neutral_050/75 rounded-full p-4 flex flex-row items-center justify-center mx-auto gap-2">
                                                 <h1 class="text-neutral_900 font-semibold">hapus</h1>
                                                 <svg width="16" class="mx-auto" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                     <path d="M5 0V1H0V3H1V16C1 16.5304 1.21071 17.0391 1.58579 17.4142C1.96086 17.7893 2.46957 18 3 18H13C13.5304 18 14.0391 17.7893 14.4142 17.4142C14.7893 17.0391 15 16.5304 15 16V3H16V1H11V0H5ZM3 3H13V16H3V3ZM5 5V14H7V5H5ZM9 5V14H11V5H9Z" fill="#E53935" />
                                                 </svg>
                                             </button>
                                         </td>
                                     </tr>
                             <?php $row++;
                                    }
                                } ?>
                             <!-- list 1 end -->
                         </tbody>
                     </table>
                     <h1 id="tidak_ditemukan" class="hidden mt-7 ml-2 text-lg">Data Tidak Ditemukan</h1>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- table end -->
 <script>
     const open = document.getElementById('open');
     const atas = document.getElementById('atas');
     const table = document.getElementById('table');
     const garis = document.getElementById('garis');
     const plus = document.getElementById('plus');
     const search = document.getElementById('search');
     const data_kosong = document.getElementById('data-kosong');
     const tidak_ditemukan = document.getElementById('tidak_ditemukan');

     window.addEventListener("load", () => {
         if (localStorage.getItem("open-table-riwayat-rental") == "false") {
             data_kosong.classList.add('hidden');
         }
     });

     <?php if (empty($rent)) { ?>
         data_kosong.classList.remove('hidden');
         table.classList.add('hidden');
         open.addEventListener("click", () => {
             if (localStorage.getItem("open-table-riwayat-rental") == "false") {
                 data_kosong.classList.remove('hidden');
                 table.classList.add('hidden');
             } else {
                 data_kosong.classList.add('hidden');
                 table.classList.add('hidden');
             }
         });

     <?php } ?>

     const openTable = () => {
         open.addEventListener("click", function() {
             if (atas.classList.contains('h-[77px]')) {
                 localStorage.setItem("open-table-riwayat-rental", "true");
             } else {
                 localStorage.setItem("open-table-riwayat-rental", "false");
             }
             openTab();
         });

         function openTab() {
             if (localStorage.getItem("open-table-riwayat-rental") == "false") {
                 garis.classList.add('hidden');
                 plus.classList.add('hidden');
                 table.classList.add('hidden');
                 atas.classList.remove('h-[450px]');
                 atas.classList.add('h-[77px]');
             } else {
                 setTimeout(() => {
                     table.classList.remove('hidden');
                 }, 150);
                 garis.classList.remove('hidden');
                 plus.classList.remove('hidden');
                 garis.classList.add('ease-in-out');
                 table.classList.add('ease-in-out');
                 atas.classList.add('h-[450px]');
                 atas.classList.remove('h-[77px]');
             }
         }
         if (localStorage.getItem("open-table-riwayat-rental") !== null) {
             openTab();
         }
         if (atas.classList.contains("h-[450px]")) {
             open.checked = true;
         }
     }
     openTable();
     const searchRiwayatRental = () => {
        const input = document.getElementById('search');
        const filter = input.value.toUpperCase();
        const table = document.getElementById('table');
        const tr = table.getElementsByTagName('tr');
        const td = table.querySelectorAll('td');
        let count = 0;
        for (let i = 0; i < tr.length; i++) {
            const td = tr[i].getElementsByTagName('td')[0];
            if (td) {
                const txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    count++;
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
        if (count == 0) {
            tidak_ditemukan.classList.remove('hidden');
        } else {
            tidak_ditemukan.classList.add('hidden');
        }
     }
     search.addEventListener('keyup', searchRiwayatRental);
 </script>
 <?php
    require_once 'components/riwayat/modals/rental.php';
    require_once 'components/riwayat/modals/semuaRental.php';

    ?>