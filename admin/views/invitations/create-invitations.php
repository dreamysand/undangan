<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Acara</title>
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
        <h1 class="text-[clamp(0.75rem,2vw,2rem)] font-bold mx-auto text-white">Tambah Acara</h1>
    </nav>

    <div class="container mx-auto p-6 text-[clamp(0.55rem,1vw,1rem)]">
        <!-- Form Edit Acara -->
        <form action="" method="POST" enctype="multipart/form-data" class="bg-white text-gray-800 p-6 rounded-lg shadow-lg mt-6">
            <div class="mb-4">
                <label for="event_name" class="block font-medium text-gray-700">Nama Acara</label>
                <input type="text" id="event_name" name="acara" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan nama acara">
            </div>
            <div class="mb-4">
                <label for="event_date" class="block font-medium text-gray-700">Tanggal Acara</label>
                <input type="date" id="event_date" name="tanggal" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="event_finish" class="block font-medium text-gray-700">Tanggal Acara Berakhir</label>
                <input type="date" id="event_finish" name="tanggal_berakhir" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="event_location" class="block font-medium text-gray-700">Lokasi Acara</label>
                <input type="text" id="event_location" name="lokasi" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan link lokasi acara">
            </div>
            <div class="mb-4">
                <label for="event_embed_location" class="block font-medium text-gray-700">Embed Lokasi Acara</label>
                <input type="text" id="event_embed_location" name="embed_lokasi" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan link embed lokasi acara">
            </div>
            <div class="mb-4">
                <label for="event_image" class="block font-medium text-gray-700">Unggah Gambar Acara</label>
                <input type="file" id="event_image" name="gambar" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                <p class="text-gray-500 mt-2">Format yang diperbolehkan: JPG, PNG, JPEG, GIF, WEBP, JFIF, dan SVG. Maksimal ukuran: 5MB.</p>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-[#0A2C82] text-white px-6 py-2 rounded-lg shadow hover:bg-blue-800 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 transition duration-200">
                    <i class="fas fa-save mr-2"></i>Simpan Perubahan
                </button>
            </div>
        </form>
        <script>
            const imageInput = document.getElementById('imageInput');
            const imageView = document.getElementById('imageView');
            imageInput.addEventListener('change', function (event) {
                const image = event.target.files[0];
                if (image) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        imageView.src = e.target.result;
                    }

                    reader.readAsDataURL(image);
                } else {
                    console.log('Error')
                }
            })
        </script>
    </div>
</body>
</html>
