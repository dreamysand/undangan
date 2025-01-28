<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tamu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>
<body class="bg-[#DBE5FF] font-roboto min-h-screen text-gray-800">
    <!-- Navbar -->
    <nav class="bg-[#0A2C82] shadow-lg">
        <div class="container mx-auto flex justify-between items-center p-4 relative">
            <!-- Tombol Kembali -->
            <a href="index.html" class="absolute left-4 flex items-center space-x-2 text-white bg-red-500 px-4 py-2 rounded-full shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-200">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali</span>
            </a>
            <!-- Judul Navbar -->
            <h1 class="text-2xl font-bold mx-auto text-white">Edit Tamu</h1>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        <!-- Form Edit Tamu -->
        <div class="bg-white text-gray-800 p-6 rounded-lg shadow-lg mt-6">
            <form id="editGuestForm" action="proses_edit_tamu.php" method="POST">
                <input type="hidden" name="guest_id" value="1"> <!-- Ganti dengan ID tamu yang sesuai -->

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama:</label>
                    <input type="text" id="name" name="name" value="John Doe" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon:</label>
                    <input type="tel" id="phone" name="phone" value="08123456789" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                    <input type="email" id="email" name="email" value="john.doe@example.com" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Alamat:</label>
                    <input type="text" id="address" name="address" value="Jakarta" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="institution" class="block text-sm font-medium text-gray-700">Instansi:</label>
                    <input type="text" id="institution" name="institution" value="ABC Corp" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="flex justify-end gap-4">
                    <button type="submit" class="bg-[#0A2C82] text-white px-6 py-2 rounded-lg shadow hover:bg-blue-800 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 transition duration-200">
                        <i class="fas fa-save mr-2"></i>Simpan Perubahan
                    </button>
                    <button type="button" class="bg-gray-300 text-gray-800 px-6 py-2 rounded-lg shadow hover:bg-gray-400 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-gray-400 transition duration-200" onclick="window.location.href='index.html'">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
