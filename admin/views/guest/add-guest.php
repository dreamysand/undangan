<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Guest</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-[#DBE5FF] font-roboto min-h-screen text-gray-800">
    <!-- Navbar -->
    <nav class="bg-[#0A2C82] shadow-lg flex justify-between items-center p-4 relative">
        <!-- Tombol Kembali -->
        <a onclick="window.location.href = localStorage.getItem('previousPage')" class="absolute left-4 flex items-center space-x-2 text-white bg-red-500 px-4 py-2 rounded-full shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-200 text-[clamp(0.50rem,1vw,0.75rem)]">
            <i class="fas fa-arrow-left"></i>
            <span class="hidden md:block">Kembali</span>
        </a>
        <!-- Judul Navbar -->
        <h1 class="text-[clamp(0.75rem,2vw,2rem)] font-bold mx-auto text-white">Tambah Guest</h1>
    </nav>

    <div class="container mx-auto p-6 text-[clamp(0.55rem,1vw,1rem)]">
        <!-- Form Edit Acara -->
        <form action="" method="POST" enctype="multipart/form-data" class="bg-white text-gray-800 p-6 rounded-lg shadow-lg mt-6">
                <div class="mb-4">
                    <label for="nama" class="block font-medium text-gray-700">Nama Tamu</label>
                    <input type="text" id="nama" name="nama" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan Username">
                    <input type="text" id="acara_id" name="acara_id" value="<?= $_GET['id_event'] ?>" hidden>
                </div>
                <div class="mb-4">
                    <label for="no_tel" class="block font-medium text-gray-700">Nomor Telepon</label>
                    <input type="phone" id="no_tel" name="no_tel" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan Nomor Telepon">
                </div>
                <div class="mb-4">
                    <label for="email" class="block font-medium text-gray-700">Email Tamu</label>
                    <input type="email" id="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan Username">
                </div>
                <div class="mb-4">
                    <label for="alamat" class="block font-medium text-gray-700">Alamat Tamu</label>
                    <input type="text" id="alamat" name="alamat" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan Username">
                </div>
                <div class="mb-4">
                    <label for="instansi" class="block font-medium text-gray-700">Instansi</label>
                    <input type="text" id="instansi" name="instansi" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                    <p class="text-gray-500 mt-2">Kosongkan jika tidak terdaftar pada suatu instansi</p>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-[#0A2C82] text-white px-6 py-2 rounded-lg shadow hover:bg-blue-800 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 transition duration-200">
                        <i class="fas fa-save mr-2"></i>Simpan Perubahan
                    </button>
                </div>
        </form>
    </div>
</body>
</html>