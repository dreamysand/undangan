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
    <nav class="bg-[#0A2C82] shadow-lg flex justify-between items-center p-4 relative">
        <!-- Tombol Kembali -->
        <a onclick="window.location.href = localStorage.getItem('previousPage')" class="absolute left-4 flex items-center space-x-2 text-white bg-red-500 px-4 py-2 rounded-full shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-200 text-[clamp(0.50rem,1vw,0.75rem)]">
            <i class="fas fa-arrow-left"></i>
            <span class="hidden md:block">Kembali</span>
        </a>
        <!-- Judul Navbar -->
        <h1 class="text-[clamp(0.75rem,2vw,2rem)] font-bold mx-auto text-white">Guest Detail</h1>
    </nav>

    <div class="container mx-auto p-6 max-w-lg">
        <div class="bg-white rounded-lg shadow-md p-6">
            <img src="<?= $guest['f_file_path'].$guest['f_kode_qr']; ?>" alt="QR Code" class="w-40 h-40 mx-auto mb-4 border border-gray-300 rounded-lg">
            <h2 class="text-[clamp(1rem,2vw,2rem)] font-bold text-center mb-2">
                <?= $guest['f_nama_tamu']; ?>
            </h2>
            <p class="text-center text-gray-600 mb-4 text-[clamp(0.70rem,1vw,1rem)]">
                Kode Unik: <span class="font-semibold"> <?= $guest['f_kode_unik_tamu']; ?> </span>
            </p>
            <p class="text-center text-gray-600 mb-4 text-[clamp(0.70rem,1vw,1rem)]">
                Email: <span class="font-semibold"> <?= $guest['f_email_tamu']; ?> </span>
            </p>
            <p class="text-center text-gray-600 mb-6 text-[clamp(0.70rem,1vw,1rem)]">
                Acara: <span class="font-semibold"> <?= $guest['f_acara']; ?> </span>
            </p>
            <p class="text-center text-gray-600 mb-6 text-[clamp(0.70rem,1vw,1rem)]">
                Nomor Telepon: <span class="font-semibold"> <?= $guest['f_nomor_telepon']; ?> </span>
            </p>
            <p class="text-center text-gray-600 mb-6 text-[clamp(0.70rem,1vw,1rem)]">
                Alamat: <span class="font-semibold"> <?= $guest['f_alamat']; ?> </span>
            </p>
            <p class="text-center text-gray-600 mb-6 text-[clamp(0.70rem,1vw,1rem)]">
                Instansi: <span class="font-semibold"> <?= $guest['f_instansi']; ?> </span>
            </p>
            <div class="flex justify-center space-x-4">
                <button class="bg-green-500 text-white px-4 py-2 rounded-lg shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75 transition duration-200 text-[clamp(0.50rem,1vw,0.89rem)] flex items-center" onclick="window.location.href='edit.php?id_guest=<?= $guest['f_id'] ?>'">
                    <i class="fas fa-edit mr-0 md:mr-2"></i> <span class="hidden md:block">Edit</span>
                </button>
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 transition duration-200 text-[clamp(0.50rem,1vw,0.89rem)] flex items-center" onclick="window.location.href='edit.php?id_guest=<?= $guest['f_id'] ?>'">
                    <i class="fas fa-paper-plane mr-0 md:mr-2"></i> <span class="hidden md:block">Kirim</span>
                </button>
                <button class="bg-red-500 text-white px-4 py-2 rounded-lg shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75 transition duration-200 text-[clamp(0.50rem,1vw,0.89rem)] flex items-center" onclick="confirmDelete(<?= $guest['f_id'] ?>)">
                    <i class="fas fa-trash-alt mr-0 md:mr-2"></i> <span class="hidden md:block">Hapus</span>
                </button>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm("Apakah Anda yakin ingin menghapus tamu ini?")) {
                window.location.href = 'delete.php?id_guest=' + id;
            }
        }
    </script>
</body>
</html>