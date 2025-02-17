<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Invitation List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
</head>
<body class="bg-gray-100 font-roboto min-h-screen text-gray-800">
    <!-- Navbar -->
    <nav class="bg-[#0A2C82] shadow-lg flex justify-between items-center p-4">
        <a onclick="window.location.href='../'" class="flex items-center space-x-2 text-white px-4 py-2 rounded-full shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-200">
            <i class="fas fa-arrow-left text-[clamp(0.75rem,2vw,1rem)]"></i>
        </a>
        <h1 class="text-[clamp(0.75rem,2vw,2rem)] font-bold text-white text-center">Admin - Invitations</h1>
        <button class="flex items-center bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 transition duration-200 text-[clamp(0.50rem,1vw,0.89rem)]" onclick="window.location.href='create.php'">
            <i class="fas fa-plus mr-0 md:mr-2"></i> <span class="hidden md:block">Tambah Undangan</span>
        </button>
    </nav>

    <div class="container mx-auto p-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($result as $acara): ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden relative hover:scale-[1.05] transition ease-in-out">
                    <div class="absolute right-4 top-4 flex flex-col text-[clamp(0.50rem,1vw,0.89rem)]">
                        <button class="bg-green-500 opacity-25 transition ease-in hover:opacity-100 text-white px-2 py-2 rounded-lg mb-2 shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 z-[999]" onclick="window.location.href='edit.php?id_acara=<?= $acara['f_id'] ?>'">
                         <i class="fas fa-pen-square mr-2">
                         </i>
                         Edit Acara
                        </button>
                        <button class="bg-red-500 opacity-25 transition ease-in hover:opacity-100 text-white px-2 py-2 rounded-lg shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 z-[999]" onclick="ConfirmDelete(<?=$acara['f_id'] ?>)">
                         <i class="fas fa-trash mr-2">
                         </i>
                         Hapus Acara
                        </button>
                    </div>
                    <div class="absolute left-4 top-4 flex flex-col text-[clamp(0.50rem,1vw,0.89rem)]">
                        <button class="bg-blue-500 opacity-25 transition ease-in hover:opacity-100 text-white px-4 py-2 rounded-lg mb-2 shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 z-[999]" onclick="window.location.href='guest-list.php?id_event=<?= $acara['f_id'] ?>'">
                         <i class="fas fa-address-book mr-2">
                         </i>
                         Daftar Tamu
                        </button>
                        <button class="bg-blue-500 opacity-25 transition ease-in hover:opacity-100 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 z-[999]" onclick="window.location.href='gallery.php?id_acara=<?= $acara['f_id'] ?>'">
                         <i class="fas fa-images mr-2">
                         </i>
                         Galeri Acara
                        </button>
                    </div>
                        <div class="aspect-[3/4] relative cursor-pointer group" onclick="window.location.href='<?= $acara['f_file_path'];?>'">
                         <img alt="<?= $acara['f_acara'] ?>" class="w-full h-[80%] object-cover transition-transform duration-300 group-hover:scale-[2]" src="<?= $acara['f_image']; ?>"/>
                            <div class="p-4 bottom-0 group-hover:bg-white group-hover:bg-opacity-50 transition-transform duration-300 w-full h-auto absolute">
                              <h2 class="text-[clamp(0.75rem,2vw,1.5rem)] font-bold mb-2">
                               <?= $acara['f_acara']; ?>
                              </h2>
                              <div class="flex items-center justify-between text-[#0E37E7] text-[clamp(0.50rem,1vw,0.89rem)]">
                               <span>
                                <i class="fas fa-calendar-alt mr-2">
                                </i>
                                <?= $acara['f_tanggal_acara'];  ?>
                               </span>
                               <span>
                                <i class="fas fa-address-book mr-2">
                                </i>
                                    <?php 
                                        $total=CountGuest($acara['f_id']);
                                        $total_Guest = $total['total_Guest'];
                                        echo $total_Guest; 
                                    ?> Orang
                               </span>
                               <span>
                                <i class="fas fa-map-marker-alt mr-2">
                                </i>
                                <a href="<?= $acara['f_alamat'] ?>">
                                    Klik untuk melihat lokasi
                                </a>
                               </span>
                              </div>
                            </div>
                        </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script>
        localStorage.setItem("previousPage", window.location.href);
        function ConfirmDelete(id) {
            if (confirm("Apakah anda yakin menghapus file ini")) {
                window.location.href = `delete.php?id_acara=${id}`;
            }
        }
    </script>
</body>
</html>
