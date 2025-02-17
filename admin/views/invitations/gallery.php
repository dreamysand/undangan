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
        <a onclick="window.location.href='event-list.php'" class="flex items-center space-x-2 text-white px-4 py-2 rounded-full shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-200">
            <i class="fas fa-arrow-left text-[clamp(0.75rem,2vw,1rem)]"></i>
        </a>
        <h1 class="text-[clamp(0.75rem,2vw,2rem)] font-bold text-white text-center">Admin - Galeri</h1>
        <button class="flex items-center bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 transition duration-200 text-[clamp(0.50rem,1vw,0.89rem)]" onclick="window.location.href='create.php?gallery&id_acara=<?=$_GET['id_acara']?>'">
            <i class="fas fa-plus mr-0 md:mr-2"></i> <span class="hidden md:block">Tambah Galeri</span>
        </button>
    </nav>

    <div class="container mx-auto p-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($result as $galeri): ?>
                <div class="relative">
                     <button class="absolute left-2 top-2 bg-red-500 opacity-25 transition ease-in hover:opacity-100 text-white px-2 py-2 rounded-lg shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 z-[999] text-[clamp(0.50rem,1vw,0.89rem)]" onclick="ConfirmDelete(<?=$galeri['f_id'] ?>)">
                         <i class="fas fa-trash">
                         </i>
                    </button>
                    <img alt="<?= $galeri['f_file_path'].$galeri['f_image'] ?>" class="aspect-[10/9] w-full h-[80%] object-cover" src="<?=  $galeri['f_file_path'].$galeri['f_image']; ?>"/>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script>
        localStorage.setItem("previousPage", window.location.href);
        function ConfirmDelete(id) {
            if (confirm("Apakah anda yakin menghapus file ini")) {
                window.location.href = `delete.php?id_image=${id}`;
            }
        }
    </script>
</body>
</html>
