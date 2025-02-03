<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Acara</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-[#DBE5FF] font-roboto min-h-screen text-gray-800">
    <!-- Navbar -->
    <nav class="bg-[#0A2C82] shadow-lg">
        <div class="container mx-auto flex justify-between items-center p-4 relative">
            <!-- Tombol Kembali -->
            <a onclick="history.back()" class="absolute left-4 flex items-center space-x-2 text-white bg-red-500 px-4 py-2 rounded-full shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-200">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali</span>
            </a>
            <!-- Judul Navbar -->
            <h1 class="text-2xl font-bold mx-auto text-white">Edit Acara</h1>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        <!-- Form Edit Acara -->
        <form action="" method="POST" enctype="multipart/form-data" class="bg-white text-gray-800 p-6 rounded-lg shadow-lg mt-6">
            <div class="mb-4">
                <label for="event_name" class="block text-sm font-medium text-gray-700">Nama Acara</label>
                <input type="text" id="event_name" value="<?= $acara['f_acara'];?>" name="acara" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan nama acara">
            </div>
            <input type="text" value="<?= $acara['f_file_path'];?>" name="filePath" hidden>
            <div class="mb-4">
                <label for="event_date" class="block text-sm font-medium text-gray-700">Tanggal Acara</label>
                <input type="date" id="event_date" value="<?= $acara['f_tanggal_acara'];?>" name="tanggal" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="event_location" class="block text-sm font-medium text-gray-700">Lokasi Acara</label>
                <input type="text" id="event_location" value="<?= $acara['f_alamat'];?>" name="lokasi" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan lokasi acara">
            </div>
            <input type="text" value="<?= str_replace("../".strtolower(str_replace(" ", "-",$acara['f_acara']))."/asset/", "", $acara['f_image']);?>" name="imageOld" hidden>
            <div class="mb-4">
                <label for="event_image" class="block text-sm font-medium text-gray-700">Unggah Gambar Acara</label>
                <input type="file" id="event_image" name="gambar" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                <p class="text-sm text-gray-500 mt-2">Format yang diperbolehkan: JPG, PNG, JPEG, GIF, WEBP, JFIF, dan SVG. Maksimal ukuran: 5MB.</p>
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
