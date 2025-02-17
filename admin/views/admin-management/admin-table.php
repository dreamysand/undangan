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
    <nav class="bg-[#0A2C82] shadow-lg flex justify-between items-center p-4">
        	<a onclick="window.location.href='../'" class="flex items-center space-x-2 text-white px-4 py-2 rounded-full shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-200">
                <i class="fas fa-arrow-left text-[clamp(0.75rem,2vw,1rem)]"></i>
            </a>
            <h1 class="text-[clamp(0.75rem,2vw,2rem)] font-bold text-white">Admin - Admin List</h1>
            <button class="flex items-center bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 transition duration-200 text-[clamp(0.50rem,1vw,0.89rem)]" onclick="window.location.href='create.php?admin'">
                <i class="fas fa-plus mr-0 md:mr-2"></i> <span class="hidden md:block">Tambah Admin</span>
            </button>
    </nav>

    <div class="container mx-auto p-6">
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
            <table class="min-w-full text-left text-gray-800 text-center text-wrap">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-2 py-2 font-medium text-[clamp(0.45rem,1vw,1rem)]">ID</th>
                        <th class="px-2 py-2 font-medium text-[clamp(0.45rem,1vw,1rem)]">Username</th>
                        <th class="px-2 py-2 font-medium text-[clamp(0.45rem,1vw,1rem)]">Email</th>
                        <th class="px-2 py-2 font-medium text-[clamp(0.45rem,1vw,1rem)]">Password</th>
                        <th class="px-2 py-2 font-medium text-[clamp(0.45rem,1vw,1rem)]">Status</th>
                        <th class="px-2 py-2 font-medium text-[clamp(0.45rem,1vw,1rem)]">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $admin): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-2 py-2 text-[clamp(0.45rem,1vw,1rem)]"><?= $admin['f_id'] ?></td>
                            <td class="px-2 py-2 text-[clamp(0.45rem,1vw,1rem)]"><?= $admin['f_username'] ?></td>
                            <td class="px-2 py-2 text-[clamp(0.45rem,1vw,1rem)]"><?= $admin['f_email'] ?></td>
                            <td class="px-2 py-2 text-[clamp(0.45rem,1vw,1rem)]"><?= $admin['f_password'] ?></td>
                            <td class="px-2 py-2 text-[clamp(0.45rem,1vw,1rem)]"><?= $admin['f_status'] ?></td>
                            <td class="px-2 py-2 text-[clamp(0.45rem,1vw,1rem)] grid grid-cols-1 gap-1 sm:grid-cols-2 sm:gap-3">
                            	<a href="edit.php?id_admin=<?= $admin['f_id'] ?>" class="bg-[#82EA4A] p-1 hover:bg-opacity-75 rounded-md">
                            		<i class="fas fa-pen-square"></i>
                                    <span class="hidden md:block">Edit Admin</span>
                            	</a>
                            	<a href="#" onclick="confirmDelete(<?=$admin['f_id'] ?>)" class="bg-[#E21313] p-1 hover:bg-opacity-75 text-white rounded-md">
                            		<i class="fas fa-trash"></i>
                                    <span class="hidden md:block">Hapus Admin</span>
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