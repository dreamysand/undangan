<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Detail</title>
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
            <h1 class="text-2xl font-bold text-white text-center">Guest Detail</h1>
        </div>
    </nav>

    <div class="container mx-auto p-6 max-w-lg">
        <div class="bg-white rounded-lg shadow-md p-6">
            <img src="<?= $guest['f_file_path'].$guest['f_kode_qr']; ?>" alt="QR Code" class="w-40 h-40 mx-auto mb-4 border border-gray-300 rounded-lg">
            <h2 class="text-2xl font-bold text-center mb-2">
                <?= $guest['f_nama_tamu']; ?>
            </h2>
            <p class="text-center text-gray-600 mb-4">
                Kode Unik: <span class="font-semibold"> <?= $guest['f_kode_unik_tamu']; ?> </span>
            </p>
            <p class="text-center text-gray-600 mb-4">
                Email: <span class="font-semibold"> <?= $guest['f_email_tamu']; ?> </span>
            </p>
            <p class="text-center text-gray-600 mb-6">
                Acara: <span class="font-semibold"> <?= $guest['f_acara']; ?> </span>
            </p>
            <p class="text-center text-gray-600 mb-6">
                Nomor Telepon: <span class="font-semibold"> <?= $guest['f_nomor_telepon']; ?> </span>
            </p>
            <p class="text-center text-gray-600 mb-6">
                Alamat: <span class="font-semibold"> <?= $guest['f_alamat']; ?> </span>
            </p>
            <p class="text-center text-gray-600 mb-6">
                Instansi: <span class="font-semibold"> <?= $guest['f_instansi']; ?> </span>
            </p>
            <div class="flex justify-center space-x-4">
                <button class="bg-green-500 text-white px-4 py-2 rounded-lg shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75 transition duration-200" onclick="window.location.href='edit.php?id_guest=<?= $guest['f_id'] ?>'">
                    <i class="fas fa-edit mr-2"></i> Edit
                </button>
                <button class="bg-red-500 text-white px-4 py-2 rounded-lg shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75 transition duration-200" onclick="confirmDelete(<?= $guest['f_id'] ?>)">
                    <i class="fas fa-trash-alt mr-2"></i> Hapus
                </button>
            </div>
        </div>
    </div>

    <script>
        localStorage.setItem("previousPage", window.location.href);
        function confirmDelete(id) {
            if (confirm("Apakah Anda yakin ingin menghapus tamu ini?")) {
                window.location.href = 'delete.php?id_guest=' + id;
            }
        }
    </script>
</body>
</html>