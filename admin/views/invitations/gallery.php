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
    <nav class="bg-[#0A2C82] shadow-lg">
        <div class="container mx-auto flex justify-between items-center p-4">
            <a onclick="window.location.href='../'" class="absolute left-4 flex items-center space-x-2 text-white px-4 py-2 rounded-full shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-200">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl font-bold text-white text-center">Admin - Invitations</h1>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 transition duration-200" onclick="window.location.href='create.php?gallery&id_acara=<?=$_GET['id_acara']?>'">
                <i class="fas fa-plus mr-2"></i> Tambah Galeri
            </button>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($result as $galeri): ?>
                <img alt="<?= $galeri['f_image'] ?>" class="w-full h-[80%] object-cover transition-transform duration-300 group-hover:scale-[2]" src="<?= $galeri['f_image']; ?>"/>
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
