<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Admin Table</title>
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
            <h1 class="text-2xl font-bold text-white">Admin - Admin List</h1>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 transition duration-200" onclick="window.location.href='create.php?admin'">
                <i class="fas fa-plus mr-2"></i> Tambah Admin
            </button>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
            <table class="min-w-full text-left text-sm text-gray-800 text-center">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 font-medium">ID</th>
                        <th class="px-4 py-2 font-medium">Username</th>
                        <th class="px-4 py-2 font-medium">Email</th>
                        <th class="px-4 py-2 font-medium">Password</th>
                        <th class="px-4 py-2 font-medium">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $admin): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2"><?= $admin['f_id'] ?></td>
                            <td class="px-4 py-2"><?= $admin['f_username'] ?></td>
                            <td class="px-4 py-2"><?= $admin['f_email'] ?></td>
                            <td class="px-4 py-2"><?= $admin['f_password'] ?></td>
                            <td class="px-4 py-2">
                            	<a href="edit.php?id_admin=<?= $admin['f_id'] ?>" class="bg-[#82EA4A] p-1 hover:bg-opacity-75 rounded-md mr-5">
                            		<i class="fas fa-pen-square mr-2 mb-[1rem]"></i> Edit Admin
                            	</a>
                            	<a href="#" onclick="confirmDelete(<?=$admin['f_id'] ?>)" class="bg-[#E21313] p-1 hover:bg-opacity-75 text-white rounded-md">
                            		<i class="fas fa-trash mr-2"></i> Hapus Admin
                            	</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        localStorage.setItem("previousPage", window.location.href);
        function confirmDelete(id) {
            if (confirm("Apakah Anda yakin ingin menghapus tamu ini?")) {
                window.location.href = `delete.php?id_admin=${id}`;
            }
        }
    </script>
</body>
</html>