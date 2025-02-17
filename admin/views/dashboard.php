<html>
 <head>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Inter', sans-serif;
        }
  </style>
 </head>
 <body class="bg-gray-100" style="background-color:#1877F2;">
  <div class="container mx-auto p-4">
   <nav class="flex justify-between items-center bg-white p-4 rounded shadow">
    <div class="flex space-x-4">
     <a class="text-blue-600 font-semibold" href="#">
      DASHBOARD
     </a>
     <a class="text-blue-600 font-semibold" href="event-list.php">
      ACARA
     </a>
     <a class="text-blue-600 font-semibold" href="admin-table.php">
      LIST ADMIN
     </a>
    </div>
    <div class="relative">
        <button id="admin-btn" class="text-blue-600 font-semibold focus:outline-none cursor-pointer">
            <?= $_COOKIE['remember_me'] ?>
        </button>

        <!-- Dropdown -->
        <div id="admin-dropdown" class="absolute right-0 mt-2 w-32 bg-white border rounded shadow-md hidden">
            <a href="logout.php" class="block px-4 py-2 text-red-600 hover:bg-gray-100">
                Logout
            </a>
        </div>
    </div>
   </nav>
   <div class="bg-white mt-6 p-6 rounded shadow flex flex-col md:flex-row items-center">
    <div class="md:w-2/3 p-4">
     <h1 class="text-2xl font-bold text-gray-800">
      Buat Undangan Online Gratis untuk Acara Sekolah! Cocok untuk berbagai acara, seperti:
      <span class="text-blue-600">
       JobFair
      </span>
     </h1>
     <p class="mt-4 text-gray-600">
      Tanpa Ribet, Cepat, dan Praktis! Atur dan bagikan undangan digital dengan mudah, langsung dari platform kami. Solusi ideal untuk administrator acara sekolah yang profesional dan efisien!
     </p>
     <button class="mt-6 bg-blue-600 text-white px-4 py-2 rounded">
      Buat Sekarang!
     </button>
    </div>
    <div class="md:w-1/3 p-4">
     <img alt="School entrance with a signboard of SMKN 71 Jakarta Timur" class="rounded shadow" width="1000px" height="200px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJ8eXzF-A6GNHoN0LjeMq5zF3UznG6bJMfVg&s" width="300"/>
    </div>
   </div>
  </div>
 </body>
 <script>
    document.getElementById("admin-btn").addEventListener("click", function () {
        document.getElementById("admin-dropdown").classList.toggle("hidden");
    });

    // Menutup dropdown jika klik di luar
    document.addEventListener("click", function (event) {
        let dropdown = document.getElementById("admin-dropdown");
        let button = document.getElementById("admin-btn");
        if (!button.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add("hidden");
        }
    });
</script>
</html>
