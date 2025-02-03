<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Guest List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
</head>
<body class="bg-gray-100 font-roboto min-h-screen text-gray-800">
    <!-- Navbar -->
    <nav class="bg-[#0A2C82] shadow-lg">
        <div class="container mx-auto flex justify-between items-center p-4">
            <a onclick="history.back()" class="absolute left-4 flex items-center space-x-2 text-white px-4 py-2 rounded-full shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-200">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl font-bold text-white text-center">Admin - Guest List</h1>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 transition duration-200" onclick="window.location.href='create.php?id_event=<?= $events['f_id'] ?>'">
                <i class="fas fa-plus mr-2"></i> Tambah Tamu
            </button>
        </div>
    </nav>
    <div class="container mx-auto p-6">
        <h1 class="text-[clamp(2rem,4vw,3rem)] font-bold text-center mb-3">    
            <?= $events['f_acara'] ?>
        </h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($result as $tamu): ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden relative hover:scale-[1.05] transition ease-in-out">
                    
                        <div class="aspect-[4/4] relative cursor-pointer group guestInfo" id="guestInfo<?=$tamu['f_id'] ?>" onclick="window.location.href='guest-detail.php?id_guest=<?=$tamu['f_id'] ?>'">
                         <img alt="<?= $tamu['f_nama_tamu'] ?>" class="mx-auto my-auto w-[80%] h-[80%] object-cover transition-transform duration-300" src="<?=$tamu['f_file_path'].$tamu['f_kode_qr']; ?>"/>
                            <div class="flex justify-between items-center p-4 bottom-0 group-hover:bg-white group-hover:bg-opacity-50 transition-transform duration-300 w-full h-auto absolute">
                              <h2 class="text-xl font-semibold">
                                <?= $tamu['f_kode_unik_tamu']; ?>
                                /
                                <span class="font-semibold">
                                    <?= $tamu['f_nama_tamu']; ?>
                                </span>
                              </h2>
                              <div>
                                <button class="bg-green-500 transition ease-in hover:opacity-100 text-white px-4 py-2 rounded-lg shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75 z-[999] mr-2" onmouseover="HideDetail(<?= $tamu['f_id'] ?>)" onmouseout="ShowDetail(<?= $tamu['f_id'] ?>)" onclick="window.location.href='edit.php?id_guest=<?= $tamu['f_id'] ?>'">
                                     <i class="fas fa-pen-square">
                                     </i>
                                </button>
                                <button class="bg-red-500 transition ease-in hover:opacity-100 text-white px-4 py-2 rounded-lg shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75 z-[999]" onmouseover="HideDetail(<?= $tamu['f_id'] ?>)" onmouseout="ShowDetail(<?= $tamu['f_id'] ?>)" onclick="confirmDelete(<?= $tamu['f_id'] ?>, <?= $tamu['f_acara_id'] ?>)">
                                     <i class="fas fa-trash">
                                     </i>
                                </button>
                                  
                              </div>
                            </div>
                        </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script>
        localStorage.setItem("previousPage", window.location.href);
        function confirmDelete(id, eventId) {
            if (confirm("Apakah Anda yakin ingin menghapus tamu ini?")) {
                window.location.href = `delete.php?id_guest=${id}&id_event=${eventId}`;
            }
        }

        function HideDetail(id) {
            let detail_guest = document.getElementById(`guestInfo${id}`);

            detail_guest.removeAttribute("onclick");
        }

        function ShowDetail(id) {
            let detail_guest = document.getElementById(`guestInfo${id}`);

            detail_guest.setAttribute("onclick", "window.location.href='dashboard.php'")
        }
    </script>
</body>
</html>
